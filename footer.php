</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/5fc8cb6b98.js"></script>

<!-- Modal ADDactor -->
<div class="modal fade" id="modaladdactor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Добавление актеров к фильму</h5>
        <button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h3>Выберите актера для добавления</h3>
          <select  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="addactors" size=10>
            <option selected>&nbsp;</option>
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary addactorinfilm">Добавить</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal COPactor -->
<div class="modal fade" id="modalcopactor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Копирование актеров</h5>
        <button type="button" class="close closemodalcop" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h3>Выберите фильм для вставки актеров</h3>
          <select  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="copactors" size=10>
            <option selected>&nbsp;</option>
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closemodalcop" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary copactorinfilm">Добавить</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
