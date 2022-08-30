<?php
    include_once "./templates/generation.php";
?>


<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гарантии</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <?php
        generation_head_menu($mysqli);
    ?>
<body>
  <div class="container">
      <div class="row justify-content-center">
        <h2>Гарантии</h2>
        <hr>
        <h4>Современный подход к гарантийным обязательствам от компании OLEG-STROI</h4>
        <p>Какой бы товар покупатель ни приобретал впервые, он обязательно требует гарантию. Каждый ответственный производитель материальных и даже нематериальных ценностей берет на себя обязательство, что его продукт будет служить верой и правдой определенное время, если, конечно, не подвергается механическим и прочим воздействиям, несовместимым с правилами эксплуатации.
</p>
<h4>Гарантия от 15 лет и более, дающая уверенность</h4>
        <p>Гарантия важна, а потому покупатель/заказчик обязательно получает документ, в котором обязательства продавца отражены в полном объеме - гарантийный сертификат, договор и пр. Сроки - наиболее актуальный параметр. Чем они длиннее, тем больше доверия продавцу/производителю, особенно российскому. Наши потребители привыкли к тому, что произведенная в России продукция не отличается качеством.</p>
        <h6>Мы ломаем стереотипы и уверенны в будущем!</h6>
        <p>За один год вы вряд ли сможете определить, качественно ли были проведены все необходимые мероприятия. Поэтому OLEG-STROI дает гарантию на строительство деревянного или каменного дома от 15 лет и более, в зависимости от выбранного вами типового проекта. </p>
        <h4>Отличия нашего предложения от прочих</h4>
        <ul class="px-5">
          <li>Основная часть компаний занятых в сфере загородного строительства дают гарантии только на строительный материал.</li>
          <li>Есть строительные фирмы, которые дают дополнительную гарантию только на услуги.</li>
          <li>Иногда гарантия предоставляется в комплексе, но она слишком короткая.</li>
        </ul>
        <div class="d-flex justify-content-center">
          <a href="index.php#feedback"><button type="button" class="button btn btn-lg mt-3 mb-5">Оставить заявку</button><a>
        </div>
      </div>
  </div>
    <footer class="footer mt-auto py-3 bg-light">
      <?php
      generation_footer($mysqli);
       ?>
    </footer>
</body>
</html>
