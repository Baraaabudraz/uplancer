@extends('Front.parent')

@section('title', 'Privacy Policy')

@section('content')
    <!-- Privacy Policy Section -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-6 mb-4">Privacy Policy</h1>
                <p class="text-muted">Your privacy is important to us. This privacy policy explains how we collect, use, and protect your personal information.</p>
            </div>

            <!-- Privacy Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <h2 class="mb-4">1. Information We Collect</h2>
                        <p>
                            We may collect personal information such as your name, email address, and other details when you interact with our website, subscribe to our services, or contact us.
                        </p>

                        <h2 class="mb-4">2. How We Use Your Information</h2>
                        <p>
                            The information we collect is used to provide and improve our services, respond to your inquiries, and send you relevant updates or promotions. We may also use the information to personalize your experience on our site.
                        </p>

                        <h2 class="mb-4">3. Sharing of Information</h2>
                        <p>
                            We do not share your personal information with third parties except as necessary to fulfill your requests or comply with legal obligations. We may share anonymized data for analytics and marketing purposes.
                        </p>

                        <h2 class="mb-4">4. Cookies and Tracking Technologies</h2>
                        <p>
                            Our website uses cookies and similar technologies to enhance user experience, track site performance, and for analytics purposes. You can disable cookies in your browser settings, but this may affect the functionality of our website.
                        </p>

                        <h2 class="mb-4">5. Data Security</h2>
                        <p>
                            We take reasonable measures to protect your personal information from unauthorized access, disclosure, or alteration. However, no method of transmission over the Internet is completely secure.
                        </p>

                        <h2 class="mb-4">6. Your Rights</h2>
                        <p>
                            You have the right to request access to the personal information we hold about you, correct or delete any inaccurate data, and restrict or object to certain data processing activities.
                        </p>

                        <h2 class="mb-4">7. Changes to This Policy</h2>
                        <p>
                            We may update this privacy policy from time to time. Changes will be posted on this page, and the updated date will be reflected at the top of this document.
                        </p>

                        <h2 class="mb-4">8. Contact Us</h2>
                        <p>
                            If you have any questions or concerns regarding our privacy practices, please contact us at info@uplancerps.com.
                        </p>

                        <div class="text-center mt-4">
                            <a href="{{route('home')}}" class="btn btn-primary rounded-pill py-3 px-5">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Privacy Policy Section -->
@endsection
