<?php
$questions = [
    "q1" => [
        "question" => "Quel langage est principalement utilisé pour le développement front-end ?",
        "choices" => ["Python", "JavaScript", "PHP"],
        "answer" => "JavaScript"
    ],
    "q2" => [
        "question" => "Que signifie l'acronyme HTML ?",
        "choices" => [
            "HyperText Markup Language",
            "HighText Modern Language",
            "Hyperlink and Text Marking Language"
        ],
        "answer" => "HyperText Markup Language"
    ],
    "q3" => [
        "question" => "Quel symbole est utilisé pour les commentaires en PHP ?",
        "choices" => ["//", "#", "/* */"],
        "answer" => "//"
    ],
    "q4" => [
        "question" => "Lequel de ces langages est un langage compilé ?",
        "choices" => ["Python", "Java", "HTML"],
        "answer" => "Java"
    ]
];

$score = 0;
$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($questions as $key => $q) {
        $user_answer = $_POST[$key] ?? '';
        $correct_answer = $q["answer"];
        $is_correct = ($user_answer === $correct_answer);
        $results[$key] = [
            "user_answer" => $user_answer,
            "correct" => $is_correct,
            "correct_answer" => $correct_answer
        ];
        if ($is_correct) $score++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quiz Informatique</title>
</head>
<body>
    <h2>Mini Quiz Informatique</h2>

    <?php if ($_SERVER["REQUEST_METHOD"] != "POST"): ?>
        <form method="post" action="">
            <?php foreach ($questions as $key => $q): ?>
                <p><strong><?= $q["question"] ?></strong></p>
                <?php foreach ($q["choices"] as $choice): ?>
                    <label>
                        <input type="radio" name="<?= $key ?>" value="<?= $choice ?>" required>
                        <?= $choice ?>
                    </label><br>
                <?php endforeach; ?>
                <hr>
            <?php endforeach; ?>
            <button type="submit">Valider mes réponses</button>
        </form>

    <?php else: ?>
        <h3>Résultats</h3>
        <?php foreach ($results as $key => $r): ?>
            <p>
                <strong><?= $questions[$key]["question"] ?></strong><br>
                Votre réponse : <span style="color:<?= $r['correct'] ? 'green' : 'red' ?>"><?= $r["user_answer"] ?></span><br>
                <?php if (!$r['correct']): ?>
                    Réponse correcte : <strong><?= $r["correct_answer"] ?></strong>
                <?php endif; ?>
            </p>
            <hr>
        <?php endforeach; ?>

        <h3>Score final : <?= $score ?>/<?= count($questions) ?></h3>
        <a href="quiz.php">Recommencer</a>
    <?php endif; ?>
</body>
</html>
