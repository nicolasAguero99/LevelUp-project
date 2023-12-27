<?php
if (isset($_GET['enviado'])) { ?>
  <div style="position: absolute; top: 65px; left: 0; width: 100%;" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>¡Te has contactado exitosamente!</strong> Pronto nos pondremos en contacto contigo.
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>


<section class="container" id="home-section">
  <div class="row align-items-center container-img-info-header">
    <div class="col container-info-header">
      <h1 class="fw-bold text-center">LevelUp Games</h1>
      <main class="container">
        <div class="row align-items-start">
          <p class="p-home">
            Somos una empresa apasionada por los videojuegos y queremos compartir nuestra pasión contigo. Desde que abrimos nuestras puertas, nos hemos dedicado a ofrecer la mejor selección de juegos para todas las consolas y plataformas. Nuestro objetivo es ser la tienda de juegos número uno para todos los fanáticos de los videojuegos. <br>
            En Level Up games, sabemos que los videojuegos no son solo un pasatiempo, son una forma de vida. Por eso, nos esforzamos por ofrecer una amplia selección de juegos de calidad, desde los clásicos hasta los últimos lanzamientos. Trabajamos con los mejores proveedores y fabricantes para asegurarnos de que siempre tengas acceso a los juegos más populares del mercado.
            Además de ofrecer una amplia selección de juegos, también nos enorgullece ofrecer un excelente servicio al cliente. Nuestro personal altamente capacitado está siempre dispuesto a ayudarte a encontrar el juego perfecto y responder cualquier pregunta que puedas tener. Sabemos que cada jugador es diferente, por lo que nos aseguramos de que cada cliente reciba una atención personalizada.  <br>
            En Level Up games, creemos que los videojuegos son una forma de conectar a las personas y construir comunidades. Por eso, organizamos eventos y torneos para nuestros clientes. Es una oportunidad para que los jugadores se unan, compartan su pasión y compitan en un ambiente divertido y emocionante.
            Gracias por elegir Level Up games como su tienda de juegos favorita. Esperamos poder ayudarte a llevar tu experiencia de juego al siguiente nivel. ¡Nos vemos en la tienda!
          </p>
        </div>
      </main>
      <section>
        <h2 class="text-center">¿Tienes algún problema?</h2>
        <p class="text-center text-muted">Contáctanos y escríbenos tu problema. Nos pondrempos en contacto contigo lo antes posible.</p>
        <section class="d-flex flex-column gap-4 my-2">
          <?php if (isset($_SESSION['logged']) && $_SESSION['logged']['email']) { ?>
            <span class="text-success mt-4"><?= $_SESSION['logged']['email'] ?></span>
            <small class="text-muted">Correo electrónico ya registrado</small>
          <?php } else { ?>
            <input class="form-control" type="text" placeholder="Ingrese su correo electrónico">
          <?php } ?>
          <textarea class="form-control" name="mensaje" placeholder="Ingrese tu mensaje" cols="10" rows="10"></textarea>
          <a href="index.php?seccion=contacto&enviado" class="btn btn-primary w-100">Enviar</a>
        </section>
      </section>
      <section class="row m-auto align-items-start text-center w-50 lista-redes">
        <div class="lista-redes col">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6C2 3.79086 3.79086 2 6 2H18C20.2091 2 22 3.79086 22 6V18C22 20.2091 20.2091 22 18 22H6C3.79086 22 2 20.2091 2 18V6ZM6 4C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6ZM12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9ZM7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12ZM17.5 8C18.3284 8 19 7.32843 19 6.5C19 5.67157 18.3284 5 17.5 5C16.6716 5 16 5.67157 16 6.5C16 7.32843 16.6716 8 17.5 8Z" fill="#336699"></path>
            </g>
          </svg>
          <a href="#">Instagram</a>
        </div>
        <div class="lista-redes col">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6C2 3.79086 3.79086 2 6 2H18C20.2091 2 22 3.79086 22 6V18C22 20.2091 20.2091 22 18 22H6C3.79086 22 2 20.2091 2 18V6ZM6 4C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H12V13H11C10.4477 13 10 12.5523 10 12C10 11.4477 10.4477 11 11 11H12V9.5C12 7.567 13.567 6 15.5 6H16.1C16.6523 6 17.1 6.44772 17.1 7C17.1 7.55228 16.6523 8 16.1 8H15.5C14.6716 8 14 8.67157 14 9.5V11H16.1C16.6523 11 17.1 11.4477 17.1 12C17.1 12.5523 16.6523 13 16.1 13H14V20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6Z" fill="#336699"></path>
            </g>
          </svg>
          <a href="#">Facebook</a>
        </div>
        <div class="lista-redes col">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8486 5.65845C13.1442 5.65845 11.7626 7.0401 11.7626 8.74446C11.7626 8.95304 11.7831 9.15581 11.822 9.35119C11.8846 9.66589 11.7924 9.99153 11.5741 10.2267C11.3558 10.4619 11.0379 10.578 10.7194 10.5389C8.51116 10.268 6.50248 9.35556 4.88498 7.9954C4.91649 8.59732 5.12515 9.23671 5.57799 9.90654L6.25677 10.9106L5.14211 11.3863L4.92704 11.4781C5.0869 11.6609 5.2791 11.8487 5.49369 12.0332C5.73717 12.2425 5.97247 12.4165 6.14726 12.5381C6.23408 12.5985 6.30452 12.645 6.35171 12.6755C6.37527 12.6907 6.39294 12.7018 6.40383 12.7086L6.41495 12.7155L6.41519 12.7157L6.41551 12.7159L6.41578 12.7161L6.41619 12.7163L6.41647 12.7165L7.96448 13.655L6.34397 14.4653C6.26374 14.5054 6.18367 14.5412 6.10393 14.573C6.42924 14.8471 6.82517 15.0995 7.2464 15.2986L8.63623 15.9556L7.47226 16.9598C6.8369 17.508 6.19778 17.9166 5.36946 18.1326C6.59681 18.7875 8.00315 19.1596 9.49941 19.1596C14.3045 19.1596 18.1746 15.325 18.1746 10.6256V10.1059L18.5998 9.80721C19.2636 9.34107 19.7329 8.71068 20.0689 7.99004H18.5398H17.9084L17.637 7.41994C17.1401 6.37633 16.0772 5.65845 14.8486 5.65845ZM3.56882 12.9581C3.38031 13.174 3.29093 13.4642 3.33193 13.7553C3.44474 14.5563 3.92441 15.2462 4.45444 15.7728C4.59838 15.9158 4.75232 16.0531 4.91396 16.184C4.88926 16.1909 4.86437 16.1975 4.83925 16.2038C4.35789 16.3243 3.70926 16.3494 2.62755 16.2434C2.20934 16.2024 1.81014 16.4273 1.62841 16.8062C1.44668 17.185 1.5212 17.6371 1.81492 17.9376C3.75693 19.9245 6.48413 21.1596 9.49941 21.1596C15.212 21.1596 19.8978 16.7239 20.1628 11.126C21.4521 10.0429 22.0976 8.57673 22.4458 7.24263C22.5241 6.94292 22.459 6.62387 22.2696 6.37873C22.0803 6.13359 21.788 5.99004 21.4783 5.99004H19.1247C18.2201 4.58853 16.6437 3.65845 14.8486 3.65845C12.1796 3.65845 9.99072 5.71435 9.7793 8.32892C7.91032 7.84456 6.2705 6.78758 5.05863 5.35408C4.83759 5.09261 4.49814 4.9624 4.15894 5.00897C3.81974 5.05554 3.52794 5.27241 3.38555 5.58378C2.78087 6.90597 2.66434 8.43104 3.34116 9.98046L3.10746 10.0802C2.64466 10.2777 2.40073 10.7884 2.5379 11.2725C2.72276 11.925 3.14129 12.5011 3.56882 12.9581Z" fill="#336699"></path>
            </g>
          </svg>
          <a href="#" class="d-block">Twitter</a>
        </div>
        <div class="lista-redes col">
          <svg viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" fill="none">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path stroke="#336699" stroke-linejoin="round" stroke-width="12" d="M22 57.265V142c0 5.523 4.477 10 10 10h24V95.056l40 30.278 40-30.278V152h24c5.523 0 10-4.477 10-10V57.265c0-13.233-15.15-20.746-25.684-12.736L96 81.265 47.684 44.53C37.15 36.519 22 44.032 22 57.265Z"></path>
            </g>
          </svg>
          <a href="#" class="d-block">Gmail</a>
        </div>
      </section>
    </div>

  </div>

</section>