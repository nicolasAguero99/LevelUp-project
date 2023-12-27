<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">Agregar nuevo desarrollador</h1>
    <div class="m-auto col-10 col-md-8 col-lg-6 col-xl-4">
      <form action="actions/add_desarrollador_acc.php" method="POST">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input autocomplete="off" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del desarrollador">
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn text-light w-100" style="background-color: #028171;">Subir</button>
        </div>
      </form>
    </div>
  </div>
</div>