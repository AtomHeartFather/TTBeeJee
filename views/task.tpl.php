 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title><?php echo $pageData['title']; ?></title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/task.css">
 	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 </head>
 <body>

	<div class="container text-center">
		
        <h1>MAIN.TPL.PHP</h1>
        <p class="lead">основная вьюха</p>
        <a href="login"><input type="submit" name="submit" class="btn btn-info btn-md" value="submit"></a>



    </div>
 	
	
	
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Имя</th>
                                                    <th>e-mail</th>
                                                    <th>Текст задачи</th>
                                                    <th>Готово</th>
                                                    <th>Отредактировано</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($pageData['taskList'] as $key => $value) { ?>
                                                        <tr data-ng-click="getUserData(<?php echo $value['id']; ?>);">
                                                            <td><?php echo $value['name']; ?></td>
                                                            <td><?php echo $value['mail']; ?></td>
                                                            <td><?php echo $value['text']; ?></td>
                                                            <td><?php echo $value['is_ready']; ?></td>
                                                            <td><?php echo $value['was_edited']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <!-- /.col-lg-8 (nested) -->
                            </div>
<!-- создание задачи -->
<div id="reg">
    <a id="button" href="#">Создание задачи</a>
      <div id="informer" class="b-toggle">
          <form id="createTask" name="test" method="post">
              <p><b>Укажите ваше имя</b><br>
               <input type="text" id="name" name="name" size="30">
              </p>
              <p><b>Укажите ваш e-mail</b><br>
               <input type="text" id="mail" name="mail" size="50">
              </p>
              <p><b>Опишите задачу</b><br>
               <input type="text" id="text" name="text" size="5000">
              </p>
              <input type="submit" id="submit" value="Отправить">
          </form>
      </div>
</div>

<script type="text/javascript">
  button.onclick = function (){
    var className = informer.className;
    if( className.indexOf(' expanded') == -1 ){
        className += ' expanded';
    }
    else {
        className = className.replace(' expanded', '');
    }
    informer.className = className;
    return false;
};

    /* attach a submit handler to the form */
    $("#createTask").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = "http://localhost/TTBeeJee/task/addTask";

      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { name: $('#name').val(), mail: $('#mail').val(), text: $('#text').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
        alert('success');
      });
    });
</script>
	 </body>
	 </html>