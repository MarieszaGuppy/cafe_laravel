<x-navbar>
    <x-slot:popup></x-slot:popup>
    <x-slot:title></x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="contact-us">
            <!-- Section Header -->
            <div class="header text-center mb-5">
                <h1>Kontak Kami</h1>
                <p class="lead">Hubungi kami kapan saja Anda butuh bantuan.</p>
            </div>

            <!-- Contact Information Section -->
            <section class="contact-info text-center my-5">
                <h2>Informasi Kontak</h2>
                <p><strong>Alamat:</strong> Jl. Cauliflower No.123, Kota Greens, Provinsi Hertz</p>
                <p><strong>Telepon:</strong> (62)8111212113</p>
                <p><strong>Email:</strong> info@teajam.com</p>
                <p><strong>Jam Operasional:</strong> Senin - Minggu, 08:00 - 20:00</p>
            </section>

            <!-- Map Section (Optional) -->
            <section class="map my-5">
                <h2 class="text-center">Lokasi Kami</h2>
                <div class="map-container text-center">
                    <!-- Replace with an embedded map iframe if you have a Google Maps location -->
                    <iframe src="https://www.google.com/maps/embed?pb=YOUR_MAP_EMBED_URL" width="100%" height="400"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </section>
        </div>
    </div>
</x-navbar>
