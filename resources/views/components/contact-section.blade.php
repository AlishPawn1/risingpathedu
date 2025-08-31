<section class="contact-section-one fix">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-left">
                        <div class="contact-bg bg-cover"
                            style="background-image: url('{{ asset('assets/img/contact/01.jpg') }}');">
                        </div>
                        <div class="contact-shape"
                            style="background-image: url({{ asset('assets/img/contact/bg-shape.png') }});">
                        </div>
                        <div class="section-title">
                            <span class="text-white wow fadeInUp">Contact us</span>
                            <h2 class="text-white title-anim">Get a Call Back</h2>
                        </div>
                        <form action="#" id="contact-form" method="POST" class="mt-4 mt-md-0">
                            <div class="row g-3">
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <input type="text" name="name" id="name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <input type="text" name="email" id="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <input type="text" name="phone" id="phone" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <div class="nice-select open" tabindex="0">
                                            <span class="current">
                                                Choose Services
                                            </span>
                                            <ul class="list">
                                                <li data-value="1" class="option selected focus">
                                                    Default sorting
                                                </li>
                                                <li data-value="1" class="option">
                                                    Sort by popularity
                                                </li>
                                                <li data-value="1" class="option">
                                                    Sort by average rating
                                                </li>
                                                <li data-value="1" class="option">
                                                    Sort by latest
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <textarea name="message" id="message"
                                            placeholder="Write Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                                    <button type="submit" class="theme-btn">
                                        <span>
                                            Send Us Messages
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-right">
                        <div class="google-map-box">
                            <iframe
                                src="https://maps.google.com/maps?q=Putalisadak%2C%20Kathmandu%2044600&z=16&output=embed"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" title="Map: Putalisadak, Kathmandu">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>