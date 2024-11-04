<x-navbar>
    <x-slot:popup></x-slot:popup>
    <x-slot:title></x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="about-us">
            <!-- Section Header -->
            <div class="header text-center mb-5">
                <h1>Tentang Kami</h1>
                <p class="lead">
                    Kenali lebih dalam TeaJam Cafe dan rahasia di balik setiap seduhan.
                </p>
            </div>

            <!-- Cafe Description Section -->
            <section class="description text-center my-5">
                <h2>TeaJam Cafe</h2>
                <p>
                    Berdiri sejak tahun 2023, Cafe Kami adalah tempat dengan suasana yang penuh kesegaran
                    dan rasa.
                    <br>
                    Terinspirasi oleh keinginan untuk membagikan pengalaman menikmati perpaduan teh yang menyenangkan,
                    <br>
                    kami menawarkan menu pilihan dengan bahan kualitas terbaik dan mengutamakan kenyamanan.
                </p>
            </section>

            <!-- Visi dan Misi Section -->
            <section class="vision-mission text-center my-5">
                <h2>Visi & Misi</h2>
                <p><strong>Visi:</strong> Menjadi cafe terbaik yang dikenal karena keunikan rasa dan pelayanan yang
                    ramah.
                </p>
                <p><strong>Misi:</strong> Memberikan pengalaman terbaik dengan menyajikan minuman berkualitas tinggi,
                    tempat nyaman, dan pelayanan yang tulus untuk semua pelanggan kami.</p>
            </section>

            <!-- Tim Section -->
            <section class="team text-center my-5">
                <h2>Tim Kami</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img width="60%" src="{{ asset('storage/img/mariesza.png') }}" alt="Mariesza Bengthie"
                            class="img-fluid rounded-circle">
                        <h3>Mariesza Bengthie</h3>
                        <p>CEO & Founder</p>
                    </div>
                    <div class="col-md-4">
                        <img width="60%" src="{{ asset('storage/img/xiaorui.png') }}" alt="Xiao Rui"
                            class="img-fluid rounded-circle">
                        <h3>Xiao Rui</h3>
                        <p>Head Barista</p>
                    </div>
                    <div class="col-md-4">
                        <img width="60%" src="{{ asset('storage/img/xiaozhang.png') }}" alt="Xiao Zhang"
                            class="img-fluid rounded-circle">
                        <h3>Xiao Zhang</h3>
                        <p>Manager</p>
                    </div>
                </div>
            </section>

            <!-- Keunikan Produk Section -->
            <section class="unique-products text-center my-5">
                <h2>Keunikan Produk Kami</h2>
                <p>
                    Kami menghadirkan menu dengan cita rasa unik dari bahan-bahan pilihan. <br>
                    Dari teh yang menyegarkan hingga sajian penutup yang manis, <br>
                    setiap hidangan diracik dengan perhatian khusus untuk memenuhi ekspektasi Anda.
                </p>
            </section>

            <!-- Penghargaan Section (Opsional) -->
            <section class="awards text-center my-5">
                <h2>Penghargaan & Testimoni</h2>
                <p>
                    Kami bangga atas apresiasi yang telah kami terima,<br>
                    termasuk dari pelanggan yang puas dengan kualitas dan layanan kami.<br>
                    Terima kasih atas kepercayaan dan antusiasme yang diberikan!
                </p>
            </section>

            <!-- Pesan & Harapan Section -->
            <section class="message text-center my-5">
                <h2>Pesan Kami untuk Anda</h2>
                <p>
                    Kami berharap setiap kunjungan Anda di cafe kami menjadi pengalaman yang berkesan.<br>
                    Terima kasih telah menjadi bagian dari perjalanan kami, dan kami menantikan kunjungan Anda kembali.
                </p>
            </section>
        </div>
    </div>
</x-navbar>
