<?php
	include_once 'header.php';
 ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <h3>Список фильмов</h3>
                <select  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="films" size=10>
                  <option selected>&nbsp;</option>
                </select>
            </div>
            <div class="col-lg-4 col-sm-12">
                <h3>Категория</h3>
                <select  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="categ" size=10 disabled>
                </select>
            </div>
            <div class="col-lg-4 col-sm-12 ">
                <h3>Актёры  <span class="addactor " title="Добавить"><i class="fa fa-plus" aria-hidden="true"></i> </span> <span class="removeactor" title="Удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></span>  <span class="actorcop" title="Скопировать в другой фильм"><i class="fa fa-clone" aria-hidden="true"></i></span></h3>
                <select  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="actor" size=10 disabled multiple >
                </select>
            </div>
        </div>
    </div>
</section>

 <?php
 	include_once 'footer.php';
  ?>
