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
                        <form action="{{ route('contact.store') }}" id="contact-form" method="POST"
                            class="mt-4 mt-md-0">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <input type="text" name="name" id="name" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="form-clt">
                                        <input type="email" name="email" id="email" placeholder="Email Address"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <input type="text" name="phone" id="phone" placeholder="Phone Number" required
                                            pattern="^9[87][0-9]{8}$">
                                        <span id="phone-error" class="error" style="display: none;"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="form-clt">
                                        <select name="service">
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
                                        <textarea name="message" id="message" placeholder="Write Your Message"
                                            required></textarea>
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
                            @if(!empty(optional($siteSetting)->map_embed))
                                {!! optional($siteSetting)->map_embed !!}
                            @else
                                <iframe
                                    src="https://maps.google.com/maps?q=Putalisadak%2C%20Kathmandu%2044600&z=16&output=embed"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade" title="Map: Putalisadak, Kathmandu">
                                </iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('phone').addEventListener('input', function (e) {
        const phoneInput = e.target;
        const phoneError = document.getElementById('phone-error');
        const phonePattern = /^9[87][0-9]{8}$/;

        if (!phoneInput.value) {
            phoneError.textContent = 'Phone number is required';
            phoneError.style.display = 'block';
        } else if (!phonePattern.test(phoneInput.value)) {
            phoneError.textContent = 'Phone number must start with 9 then 8 or 7';
            phoneError.style.display = 'block';
        } else if (phoneInput.value.length !== 10) {
            phoneError.textContent = 'Phone number must be exactly 10 digits';
            phoneError.style.display = 'block';
        } else {
            phoneError.textContent = '';
            phoneError.style.display = 'none';
        }
    });

    // Prevent form submission if phone number is invalid
    document.getElementById('contact-form').addEventListener('submit', function (e) {
        const phoneInput = document.getElementById('phone');
        const phoneError = document.getElementById('phone-error');
        const phonePattern = /^9[87][0-9]{8}$/;

        if (!phonePattern.test(phoneInput.value) || phoneInput.value.length !== 10) {
            e.preventDefault();
            phoneError.textContent = 'Please enter a valid 10-digit phone number starting with 9 and 8 or 7';
            phoneError.style.display = 'block';
        }
    });
</script>