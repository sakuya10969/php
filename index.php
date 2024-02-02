<?php

require("config/status_codes.php"); //config/status_codes.phpの読み込み

$random_indexes=array_rand($status_codes,4); //$status_codesから4つランダムにインデックスを選択している

foreach($random_indexes as $index){
    $options[]=$status_codes[$index]; // 選んだインデックスから新しい配列を4つ生成(選択肢が4つ作られた)
}

$question=$options[mt_rand(0,3)]; //上記の4つの配列のうち1つを選択し、正解として代入している

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equip="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
  </head>  

  <body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/php04">Status Code Quiz</a>
        </div>
    </header>

    <main>
        <div class="quiz__content">
            <div class="question">
                <p class="question__text">Q.以下の内容に当てはまるステータスコードを選んでください</p>
                <p class="question__text"><?php echo $question["description"] ?></p> //正解の説明の表示
            </div>
        </div>

        <form class="quiz-form" action="result.php" method="POST">
            <input type="hidden" name="answer_code" value="<?php echo $question["code"] ?>">
            <div class="quiz-form__item">
                <?php foreach($options as $option): ?> //$optionとして選択肢を表示
                <div class="quiz-form__group">
                    <input class="quiz-form__radio" id="<?php echo $option["code"] ?>" type="radio" name="option" value="<?php echo $option["code"] ?>"> 
                    <label class="quiz-form__label" for="<?php echo $option["code"] ?>">
                    <?php echo $option["code"] ?>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="quiz-form__button">
                <button class="quiz-form__button-submit" type="text">回答</button>
            </div>
        </form>
    </main>
  </body>

</html>