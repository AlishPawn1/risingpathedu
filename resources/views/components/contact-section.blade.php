@props(['formType' => 'extended'])

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
                        {{-- Contact Form --}}
                        <form action="{{ route('contact.store') }}" id="contact-form" method="POST" class="mt-4 mt-md-0">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <input type="text" name="name" id="name" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <input type="text" name="phone" id="phone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <select name="service" class="form-select">
                                            <option value="">Choose Services</option>
                                            <option value="Default sorting">Default sorting</option>
                                            <option value="Sort by popularity">Sort by popularity</option>
                                            <option value="Sort by average rating">Sort by average rating</option>
                                            <option value="Sort by latest">Sort by latest</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <textarea name="message" id="message" placeholder="Write Your Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                                    <button type="submit" class="theme-btn">
                                        <span>Send Us Messages <i class="fas fa-chevron-right"></i></span>
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