<?php 
require_once 'config/database.php';

// Ambil data untuk homepage
$berita_terbaru = getBerita(3); // 3 berita terbaru
$portofolio_terbaru = getPortofolio(null, 3); // 3 portofolio terbaru (ubah dari 6 ke 3)
$kategori_portofolio = getKategoriPortofolio();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>Beranda</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Construction Html5 Template" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=5.0"
    />
    <meta name="author" content="Themefisher" />
    <meta name="generator" content="Themefisher Constra HTML Template v1.0" />

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css" />
    <!-- Animation -->
    <link rel="stylesheet" href="plugins/animate-css/animate.css" />
    <!-- slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css" />
    <link rel="stylesheet" href="plugins/slick/slick-theme.css" />
    <!-- Colorbox -->
    <link rel="stylesheet" href="plugins/colorbox/colorbox.css" />
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="body-inner">
      <!-- Navbar Component Container -->
      <div id="navbar-container">
        <!-- Navbar will be loaded here via JavaScript -->
      </div>

      <div class="banner-carousel banner-carousel-1 mb-0">
        <div
          class="banner-carousel-item"
          style="background-image: url(images/slider-main/bg1.jpg)"
        >
          <div class="slider-content">
            <div class="container h-100">
              <div class="row align-items-center h-100">
                <div class="col-md-12 text-center">
                  <h2 class="slide-title" data-animation-in="slideInLeft">
                    22 Years of excellence in
                  </h2>
                  <h3 class="slide-sub-title" data-animation-in="slideInRight">
                    Construction Industry
                  </h3>
                  <p data-animation-in="slideInLeft" data-duration-in="1.2">
                    <a href="#" class="slider btn btn-primary"
                      >Our Services</a
                    >
                    <a href="#" class="slider btn btn-primary border"
                      >Contact Now</a
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="banner-carousel-item"
          style="background-image: url(images/slider-main/bg2.jpg)"
        >
          <div class="slider-content text-left">
            <div class="container h-100">
              <div class="row align-items-center h-100">
                <div class="col-md-12">
                  <h2 class="slide-title-box" data-animation-in="slideInDown">
                    World Class Service
                  </h2>
                  <h3 class="slide-title" data-animation-in="fadeIn">
                    When Service Matters
                  </h3>
                  <h3 class="slide-sub-title" data-animation-in="slideInLeft">
                    Your Choice is Simple
                  </h3>
                  <p data-animation-in="slideInRight">
                    <a
                      href="services.html"
                      class="slider btn btn-primary border"
                      >Our Services</a
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="banner-carousel-item"
          style="background-image: url(images/slider-main/bg3.jpg)"
        >
          <div class="slider-content text-right">
            <div class="container h-100">
              <div class="row align-items-center h-100">
                <div class="col-md-12">
                  <h2 class="slide-title" data-animation-in="slideInDown">
                    Meet Our Engineers
                  </h2>
                  <h3 class="slide-sub-title" data-animation-in="fadeIn">
                    We believe sustainability
                  </h3>
                  <p
                    class="slider-description lead"
                    data-animation-in="slideInRight"
                  >
                    We will deal with your failure that determines how you
                    achieve success.
                  </p>
                  <div data-animation-in="slideInLeft">
                    <a
                      href="contact.html"
                      class="slider btn btn-primary"
                      aria-label="contact-with-us"
                      >Get Free Quote</a
                    >
                    <a
                      href="about.html"
                      class="slider btn btn-primary border"
                      aria-label="learn-more-about-us"
                      >Learn more</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="call-to-action-box no-padding">
        <div class="container">
          <div class="action-style-box">
            <div class="row align-items-center">
              <div class="col-md-8 text-center text-md-left">
                <div class="call-to-action-text">
                  <h3 class="action-title">
                    We understand your needs on construction
                  </h3>
                </div>
              </div>
              <!-- Col end -->
              <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                <div class="call-to-action-btn">
                  <a class="btn btn-dark" href="#">Request Quote</a>
                </div>
              </div>
              <!-- col end -->
            </div>
            <!-- row end -->
          </div>
          <!-- Action style box -->
        </div>
        <!-- Container end -->
      </section>
      <!-- Action end -->

      <section id="ts-features" class="ts-features">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="ts-intro">
                <h2 class="into-title">About Us</h2>
                <h3 class="into-sub-title">We deliver landmark projects</h3>
                <p>
                  We are rethoric question ran over her cheek When she reached
                  the first hills of the Italic Mountains, she had a last view
                  back on the skyline of her hometown Bookmarksgrove, the
                  headline of Alphabet Village and the subline of her own road,
                  the Line Lane.
                </p>
              </div>
              <!-- Intro box end -->

              <div class="gap-20"></div>

              <div class="row">
                <div class="col-md-6">
                  <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-trophy"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">
                        We've Repution for Excellence
                      </h3>
                    </div>
                  </div>
                  <!-- Service 1 end -->
                </div>
                <!-- col end -->

                <div class="col-md-6">
                  <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-sliders-h"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">We Build Partnerships</h3>
                    </div>
                  </div>
                  <!-- Service 2 end -->
                </div>
                <!-- col end -->
              </div>
              <!-- Content row 1 end -->

              <div class="row">
                <div class="col-md-6">
                  <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-thumbs-up"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">Guided by Commitment</h3>
                    </div>
                  </div>
                  <!-- Service 1 end -->
                </div>
                <!-- col end -->

                <div class="col-md-6">
                  <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-users"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">A Team of Professionals</h3>
                    </div>
                  </div>
                  <!-- Service 2 end -->
                </div>
                <!-- col end -->
              </div>
              <!-- Content row 1 end -->
            </div>
            <!-- Col end -->

            <div class="col-lg-6 mt-4 mt-lg-0">
              <h3 class="into-sub-title">Our Values</h3>
              <p>
                Minim Austin 3 wolf moon scenester aesthetic, umami odio
                pariatur bitters. Pop-up occaecat taxidermy street art, tattooed
                beard literally.
              </p>

              <div class="accordion accordion-group" id="our-values-accordion">
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingOne">
                    <h2 class="mb-0">
                      <button
                        class="btn btn-block text-left"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne"
                      >
                        Safety
                      </button>
                    </h2>
                  </div>

                  <div
                    id="collapseOne"
                    class="collapse show"
                    aria-labelledby="headingOne"
                    data-parent="#our-values-accordion"
                  >
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life
                      accusamus terry richardson ad squid. 3 wolf moon officia
                      aute, non cupidata
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingTwo">
                    <h2 class="mb-0">
                      <button
                        class="btn btn-block text-left collapsed"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapseTwo"
                        aria-expanded="false"
                        aria-controls="collapseTwo"
                      >
                        Customer Service
                      </button>
                    </h2>
                  </div>
                  <div
                    id="collapseTwo"
                    class="collapse"
                    aria-labelledby="headingTwo"
                    data-parent="#our-values-accordion"
                  >
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life
                      accusamus terry richardson ad squid. 3 wolf moon officia
                      aute, non cupidata
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0 bg-transparent" id="headingThree">
                    <h2 class="mb-0">
                      <button
                        class="btn btn-block text-left collapsed"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree"
                      >
                        Integrity
                      </button>
                    </h2>
                  </div>
                  <div
                    id="collapseThree"
                    class="collapse"
                    aria-labelledby="headingThree"
                    data-parent="#our-values-accordion"
                  >
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life
                      accusamus terry richardson ad squid. 3 wolf moon officia
                      aute, non cupidata
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Accordion end -->
            </div>
            <!-- Col end -->
          </div>
          <!-- Row end -->
        </div>
        <!-- Container end -->
      </section>
      <!-- Feature are end -->

      <section id="facts" class="facts-area dark-bg">
        <div class="container">
          <div class="facts-wrapper">
            <div class="row">
              <div class="col-md-3 col-sm-6 ts-facts">
                <div class="ts-facts-img">
                  <i
                    class="fas fa-project-diagram"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num">
                    <span class="counterUp" data-count="1789">0</span>
                  </h2>
                  <h3 class="ts-facts-title">Total Projects</h3>
                </div>
              </div>
              <!-- Col end -->

              <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                <div class="ts-facts-img">
                  <i
                    class="fas fa-users"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num">
                    <span class="counterUp" data-count="647">0</span>
                  </h2>
                  <h3 class="ts-facts-title">Staff Members</h3>
                </div>
              </div>
              <!-- Col end -->

              <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                <div class="ts-facts-img">
                  <i
                    class="fas fa-clock"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num">
                    <span class="counterUp" data-count="4000">0</span>
                  </h2>
                  <h3 class="ts-facts-title">Hours of Work</h3>
                </div>
              </div>
              <!-- Col end -->

              <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                <div class="ts-facts-img">
                  <i
                    class="fas fa-globe-americas"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num">
                    <span class="counterUp" data-count="44">0</span>
                  </h2>
                  <h3 class="ts-facts-title">Countries Experience</h3>
                </div>
              </div>
              <!-- Col end -->
            </div>
            <!-- Facts end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
      </section>
      <!-- Facts end -->

      <section id="ts-service-area" class="ts-service-area pb-0">
        <div class="container">
          <div class="row text-center">
            <div class="col-12">
              <h2 class="section-title">We Are Specialists In</h2>
              <h3 class="section-sub-title">What We Do</h3>
            </div>
          </div>
          <!--/ Title row end -->

          <div class="row">
            <div class="col-lg-6">
              <div class="ts-service-box d-flex">
                <div class="ts-service-box-img">
                  <i
                    class="fas fa-home"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-service-box-info">
                  <h3 class="service-box-title">
                    <a href="#">Home Construction</a>
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit
                    Integer adipiscing erat
                  </p>
                </div>
              </div>
              <!-- Service 1 end -->

              <div class="ts-service-box d-flex">
                <div class="ts-service-box-img">
                  <i
                    class="fas fa-hammer"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-service-box-info">
                  <h3 class="service-box-title">
                    <a href="#">Building Remodels</a>
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit
                    Integer adipiscing erat
                  </p>
                </div>
              </div>
              <!-- Service 2 end -->

              <div class="ts-service-box d-flex">
                <div class="ts-service-box-img">
                  <i
                    class="fas fa-paint-brush"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-service-box-info">
                  <h3 class="service-box-title">
                    <a href="#">Interior Design</a>
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit
                    Integer adipiscing erat
                  </p>
                </div>
              </div>
              <!-- Service 3 end -->
            </div>
            <!-- Col end -->
            <div class="col-lg-6 mt-5 mt-lg-0 mb-4 mb-lg-0">
              <div class="ts-service-box d-flex">
                <div class="ts-service-box-img">
                  <i
                    class="fas fa-building"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-service-box-info">
                  <h3 class="service-box-title">
                    <a href="#">Exterior Design</a>
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit
                    Integer adipiscing erat
                  </p>
                </div>
              </div>
              <!-- Service 4 end -->

              <div class="ts-service-box d-flex">
                <div class="ts-service-box-img">
                  <i
                    class="fas fa-wrench"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-service-box-info">
                  <h3 class="service-box-title"><a href="#">Renovation</a></h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit
                    Integer adipiscing erat
                  </p>
                </div>
              </div>
              <!-- Service 5 end -->

              <div class="ts-service-box d-flex">
                <div class="ts-service-box-img">
                  <i
                    class="fas fa-shield-alt"
                    style="font-size: 48px; color: #3fd80b"
                  ></i>
                </div>
                <div class="ts-service-box-info">
                  <h3 class="service-box-title">
                    <a href="#">Safety Management</a>
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit
                    Integer adipiscing erat
                  </p>
                </div>
              </div>
              <!-- Service 6 end -->
            </div>
            <!-- Col end -->
          </div>
          <!-- Content row end -->
        </div>
        <!--/ Container end -->
      </section>
      <!-- Service end -->

      <section id="project-area" class="project-area solid-bg">
        <div class="container">
          <div class="row text-center">
            <div class="col-lg-12">
              <h3 class="section-sub-title">Portfolio Kami</h3>
              <p class="text-muted mb-5">Lihat beberapa proyek terbaru yang telah kami kerjakan</p>
            </div>
          </div>
          <!--/ Title row end -->

          <!-- Portfolio Grid -->
          <div class="row">
            <?php if (!empty($portofolio_terbaru)): ?>
              <?php foreach ($portofolio_terbaru as $portfolio): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100 portfolio-item">
                    <div class="portfolio-img">
                      <?php if ($portfolio['gambar']): ?>
                        <img src="../admin/assets/uploads/portofolio/<?php echo $portfolio['gambar']; ?>" 
                             class="card-img-top" alt="<?php echo htmlspecialchars($portfolio['judul']); ?>"
                             style="height: 250px; object-fit: cover;">
                      <?php endif; ?>
                      <div class="portfolio-overlay">
                        <div class="portfolio-overlay-content">
                          <a href="portofolio_detail.php?id=<?php echo $portfolio['id']; ?>" 
                             class="btn btn-primary btn-sm">
                             <i class="fas fa-eye"></i> Lihat Detail
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="portfolio-meta mb-2">
                        <span class="badge p-2" style="background-color: #3fd80b; color: #ffffff;">
                          <?php echo $kategori_portofolio[$portfolio['kategori']]; ?>
                        </span>
                        <small class="text-muted float-end">
                          <?php echo formatTanggalIndonesia($portfolio['tanggal']); ?>
                        </small>
                      </div>
                      <h5 class="card-title">
                        <a href="portofolio_detail.php?id=<?php echo $portfolio['id']; ?>" 
                           class="text-decoration-none">
                           <?php echo htmlspecialchars($portfolio['judul']); ?>
                        </a>
                      </h5>
                      <p class="card-text">
                        <?php echo truncateText($portfolio['deskripsi'], 100); ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-12 text-center">
                <div class="alert alert-info" role="alert">
                  <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                  <h4>Belum ada portfolio</h4>
                  <p class="text-muted">Portfolio akan segera ditambahkan.</p>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <!--/ Portfolio Grid end -->

          <div class="row">
            <div class="col-12">
              <div class="general-btn text-center">
                <a class="btn btn-primary" href="portofolio.php"
                  >Lihat Semua Portfolio</a
                >
              </div>
            </div>
          </div>
          <!-- Content row end -->
        </div>
        <!--/ Container end -->
      </section>
      <!-- Project area end -->

      <section class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="column-title">Testimonials</h3>

              <div id="testimonial-slide" class="testimonial-slide">
                <div class="item">
                  <div class="quote-item">
                    <span class="quote-text">
                      Question ran over her cheek When she reached the first
                      hills of the Italic Mountains, she had a last view back on
                      the skyline of her hometown Bookmarksgrove, the headline
                      of Alphabet Village and the subline of her own road.
                    </span>

                    <div class="quote-item-footer">
                      <img
                        loading="lazy"
                        class="testimonial-thumb"
                        src="images/clients/testimonial1.png"
                        alt="testimonial"
                      />
                      <div class="quote-item-info">
                        <h3 class="quote-author">Gabriel Denis</h3>
                        <span class="quote-subtext">Chairman, OKT</span>
                      </div>
                    </div>
                  </div>
                  <!-- Quote item end -->
                </div>
                <!--/ Item 1 end -->

                <div class="item">
                  <div class="quote-item">
                    <span class="quote-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor inci done idunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitoa tion ullamco laboris nisi aliquip consequat.
                    </span>

                    <div class="quote-item-footer">
                      <img
                        loading="lazy"
                        class="testimonial-thumb"
                        src="images/clients/testimonial2.png"
                        alt="testimonial"
                      />
                      <div class="quote-item-info">
                        <h3 class="quote-author">Weldon Cash</h3>
                        <span class="quote-subtext">CFO, First Choice</span>
                      </div>
                    </div>
                  </div>
                  <!-- Quote item end -->
                </div>
                <!--/ Item 2 end -->

                <div class="item">
                  <div class="quote-item">
                    <span class="quote-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor inci done idunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitoa tion ullamco laboris nisi ut commodo consequat.
                    </span>

                    <div class="quote-item-footer">
                      <img
                        loading="lazy"
                        class="testimonial-thumb"
                        src="images/clients/testimonial3.png"
                        alt="testimonial"
                      />
                      <div class="quote-item-info">
                        <h3 class="quote-author">Minter Puchan</h3>
                        <span class="quote-subtext">Director, AKT</span>
                      </div>
                    </div>
                  </div>
                  <!-- Quote item end -->
                </div>
                <!--/ Item 3 end -->
              </div>
              <!--/ Testimonial carousel end-->
            </div>
            <!-- Col end -->

            <div class="col-lg-6 mt-5 mt-lg-0">
              <h3 class="column-title">Happy Clients</h3>

              <div class="row all-clients">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <a href="#!"
                      ><img
                        loading="lazy"
                        class="img-fluid"
                        src="images/clients/client1.png"
                        alt="clients-logo"
                    /></a>
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <a href="#!"
                      ><img
                        loading="lazy"
                        class="img-fluid"
                        src="images/clients/client2.png"
                        alt="clients-logo"
                    /></a>
                  </figure>
                </div>
                <!-- Client 2 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <a href="#!"
                      ><img
                        loading="lazy"
                        class="img-fluid"
                        src="images/clients/client3.png"
                        alt="clients-logo"
                    /></a>
                  </figure>
                </div>
                <!-- Client 3 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <a href="#!"
                      ><img
                        loading="lazy"
                        class="img-fluid"
                        src="images/clients/client4.png"
                        alt="clients-logo"
                    /></a>
                  </figure>
                </div>
                <!-- Client 4 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <a href="#!"
                      ><img
                        loading="lazy"
                        class="img-fluid"
                        src="images/clients/client5.png"
                        alt="clients-logo"
                    /></a>
                  </figure>
                </div>
                <!-- Client 5 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <a href="#!"
                      ><img
                        loading="lazy"
                        class="img-fluid"
                        src="images/clients/client6.png"
                        alt="clients-logo"
                    /></a>
                  </figure>
                </div>
                <!-- Client 6 end -->
              </div>
              <!-- Clients row end -->
            </div>
            <!-- Col end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
      </section>
      <!-- Content end -->

      <section class="subscribe no-padding">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="subscribe-call-to-acton">
                <h3>Can We Help?</h3>
                <h4>(+9) 847-291-4353</h4>
              </div>
            </div>
            <!-- Col end -->

            <div class="col-lg-8">
              <div class="ts-newsletter row align-items-center">
                <div class="col-md-5 newsletter-introtext">
                  <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                  <p class="text-white">Latest updates and news</p>
                </div>

                <div class="col-md-7 newsletter-form">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="newsletter-email" class="content-hidden"
                        >Newsletter Email</label
                      >
                      <input
                        type="email"
                        name="email"
                        id="newsletter-email"
                        class="form-control form-control-lg"
                        placeholder="Your your email and hit enter"
                        autocomplete="off"
                      />
                    </div>
                  </form>
                </div>
              </div>
              <!-- Newsletter end -->
            </div>
            <!-- Col end -->
          </div>
          <!-- Content row end -->
        </div>
        <!--/ Container end -->
      </section>
      <!--/ subscribe end -->

      <section id="news" class="news">
        <div class="container">
          <div class="row text-center">
            <div class="col-12">
              <!-- <h2 class="section-title">Work of Excellence</h2> -->
              <h3 class="section-sub-title">Berita</h3>
            </div>
          </div>
          <!--/ Title row end -->

          <div class="row">
            <?php if (!empty($berita_terbaru)): ?>
              <?php foreach ($berita_terbaru as $berita): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <?php if ($berita['gambar']): ?>
                      <img src="../admin/assets/uploads/berita/<?php echo $berita['gambar']; ?>" 
                           class="card-img-top" alt="<?php echo htmlspecialchars($berita['judul']); ?>"
                           style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                      <div class="post-meta mb-2">
                        <small class="text-muted">
                          <i class="far fa-calendar"></i>
                          <?php echo formatTanggalIndonesia($berita['tanggal']); ?>
                        </small>
                      </div>
                      <h5 class="card-title">
                        <a href="berita_detail.php?id=<?php echo $berita['id']; ?>" 
                           class="text-decoration-none">
                           <?php echo htmlspecialchars($berita['judul']); ?>
                        </a>
                      </h5>
                      <p class="card-text flex-grow-1">
                        <?php echo truncateText($berita['isi'], 100); ?>
                      </p>
                      <div class="mt-auto">
                        <a href="berita_detail.php?id=<?php echo $berita['id']; ?>" 
                           class="btn btn-primary btn-sm">
                           Baca Selengkapnya
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-12 text-center">
                <div class="alert alert-info" role="alert">
                  <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                  <h4>Belum ada berita terbaru</h4>
                  <p class="text-muted">Silakan periksa kembali nanti untuk berita terbaru.</p>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <!--/ Content row end -->

          <div class="general-btn text-center mt-4">
            <a class="btn btn-primary" href="berita.php">Lihat Semua Berita</a>
          </div>
        </div>
        <!--/ Container end -->
      </section>
      <!--/ News end -->

      <!--/ News end -->

      <!-- Footer Component Container -->
      <div id="footer-container">
        <!-- Footer will be loaded here via JavaScript -->
      </div>

      <!-- Javascript Files

      <!-- Javascript Files
  ================================================== -->

      <!-- initialize jQuery Library -->
      <script src="plugins/jQuery/jquery.min.js"></script>
      <!-- Bootstrap jQuery -->
      <script src="plugins/bootstrap/bootstrap.min.js" defer></script>
      <!-- Slick Carousel -->
      <script src="plugins/slick/slick.min.js"></script>
      <script src="plugins/slick/slick-animation.min.js"></script>
      <!-- Color box -->
      <script src="plugins/colorbox/jquery.colorbox.js"></script>
      <!-- shuffle -->
      <script src="plugins/shuffle/shuffle.min.js" defer></script>

      <!-- Google Map API Key-->
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"
        defer
      ></script>
      <!-- Google Map Plugin-->
      <script src="plugins/google-map/map.js" defer></script>

      <!-- Template custom -->
      <script src="js/script.js"></script>

      <!-- Component Loader -->
      <script src="components/component-loader.js"></script>
    </div>
    <!-- Body inner end -->

    <style>
    /* Portfolio styling untuk homepage */
    .portfolio-item {
        transition: transform 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .portfolio-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    
    .portfolio-img {
        position: relative;
        overflow: hidden;
    }
    
    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }

    .portfolio-meta .badge {
        background-color: #3fd80b !important;
        color: #ffffff !important;
        font-size: 0.75rem;
        padding: 0.5rem 0.75rem !important;
        border-radius: 0.375rem;
        font-weight: 500;
    }

    .card-title a {
        color: #333;
        font-weight: 600;
    }

    .card-title a:hover {
        color: #3fd80b;
    }

    .card-text {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.5;
    }
    </style>
  </body>
</html>
