<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Disastrix</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('import/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('import/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('import/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('import/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">
      <div id="logo">
        <h1><a href="index.html">Disastrix</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a href="{{ route('login') }}" class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]" >Log in</a></li>
           <li><a href="{{ route('register') }}" class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]" >Register</a></li>
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to Disastrix</h1>
      <h2>Your reliable companion for emergency services information in Kenya.</h2>
      <a href="#about" class="btn-get-started">Get Started</a>
    </div>
  </section>

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row about-container">
          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Welcome to Disastrix: Your Emergency Service Companion in Kenya</h2>
            <p>
              Welcome to Disastrix, your trusted portal for seamless access to emergency services across Kenya. Our platform is meticulously designed to ensure that whether you need police, fire, medical assistance, or any other emergency service, swift and efficient help is just a few clicks away. At Disastrix, your safety and peace of mind are our top priorities. We offer tailored solutions to meet your specific needs, guaranteeing that in times of crisis, help arrives promptly and effectively, minimizing risks and ensuring timely intervention. Our dedication extends to enhancing community safety through a streamlined interface that directly connects you to essential services, ensuring emergencies are handled urgently and with care. Join us in revolutionizing emergency response in Kenya with Disastrix, where your safety is our foremost concern.
            </p>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-briefcase"></i></div>
              <h4 class="title"><a href="">Efficient Emergency Handling Platform</a></h4>
              <p class="description">Disastrix boasts a resilient and versatile platform engineered to manage a wide range of emergency scenarios with maximum efficiency. Through Disastrix, users can swiftly report emergencies, ensuring vital details reach dispatchers and responders without delay. This streamlined communication not only accelerates response times but also enhances the overall effectiveness of emergency services. By empowering individuals to relay critical information decisively during crises, Disastrix facilitates proactive and well-informed actions that can significantly influence outcomes in emergency situations.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">Comprehensive Resource Center for Safety and Preparedness</a></h4>
              <p class="description">Disastrix transcends its role as a simple emergency link to become a comprehensive resource center for safety and preparedness. Beyond facilitating immediate emergency responses, Disastrix provides invaluable safety tips, emergency preparedness guidelines, and real-time updates during crises. As your dependable ally in safeguarding communities across Kenya, we partner closely with local authorities and service providers to continuously enhance emergency response and preparedness. Our commitment ensures that Disastrix remains at the forefront of promoting safety and resilience, empowering individuals and communities to navigate emergencies with confidence.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">Our Commitment to Safety</a></h4>
              <p class="description">Disastrix is passionately committed to revolutionizing emergency response and enhancing community safety across Kenya. Our mission is to ensure that individuals have seamless access to emergency services whenever and wherever they are needed most. By leveraging technology and innovation, we strive to set new standards in emergency response efficiency and effectiveness. Through continuous research and development, we aim to integrate the latest advancements in communication and data analytics to improve response times and outcomes.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">Our Mission</a></h4>
              <p class="description">At Disastrix, your safety is at the heart of everything we do. We provide a reliable and intuitive platform that ensures prompt and effective assistance is always within reach. Whether it's connecting users with emergency responders, providing real-time updates during crises, or offering personalized safety recommendations, our commitment remains steadfast: to protect and support you in times of need. We prioritize user feedback and continuously iterate our platform to enhance user experience and address emerging safety concerns.</p>
            </div>
          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
        </div>
      </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact">
  <div class="container">
    <div class="section-header">
      <h3 class="section-title">Contact</h3>
      <p class="section-description">If you have any questions or comments, feel free to reach out.</p>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-3 col-md-4">
        <div class="info">
          <div>
            <i class="bi bi-geo-alt"></i>
            <p>Nairobi, Kenya</p>
          </div>

          <div>
            <i class="bi bi-envelope"></i>
            <p>info@example.com</p>
          </div>

          <div>
            <i class="bi bi-phone"></i>
            <p>+254722189421</p>
          </div>
        </div>

        <div class="social-links">
          <a href="#" class="github"><i class="bi bi-github"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <div class="col-lg-5 col-md-8">
        <div class="container">
          <div class="form">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group mb-3">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mb-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  </main>

  <!-- Vendor JS Files -->
  <script src="{{ asset('import/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('import/assets/js/main.js') }}"></script>
</body>

</html>
