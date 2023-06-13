<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            // paket usaha
            // User Raihan
            [
                'id' => 'AYM001',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '1',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Fried Chicken',
                'deskripsi' => "Siapkan diri Anda untuk merasakan kenikmatan dan kelezatan sejati dengan paket usaha Fried Chicken kami. Dengan nama produk Fried Chicken yang sudah terkenal, kami membawa pengalaman kuliner yang tak terlupakan ke meja Anda.\n\nPaket usaha Fried Chicken kami menawarkan peluang bagi Anda untuk memiliki bisnis yang sukses dan menguntungkan. Setiap gigitan dari ayam goreng kami yang renyah dan lezat akan membuat pelanggan Anda tergoda untuk kembali lagi dan lagi.\n\nKami menyediakan bahan-bahan berkualitas tinggi dan resep rahasia yang dikembangkan selama bertahun-tahun untuk menghadirkan cita rasa yang sempurna. Dengan teknik penggorengan khusus, kami menciptakan tekstur kulit yang renyah dan daging ayam yang juicy di dalamnya.\n\nDengan paket usaha Fried Chicken kami, Anda akan menerima panduan lengkap untuk memulai bisnis Anda sendiri. Mulai dari resep rahasia hingga strategi pemasaran yang efektif, kami akan memberikan semua yang Anda butuhkan untuk sukses.\n\nTak hanya itu, kami juga menyediakan dukungan pelanggan yang responsif dan bahan baku yang mudah ditemukan. Dengan demikian, Anda dapat fokus pada menyajikan Fried Chicken berkualitas tinggi kepada pelanggan Anda tanpa harus khawatir tentang persediaan atau masalah teknis lainnya.\n\nJangan lewatkan kesempatan untuk memiliki bisnis kuliner yang menggiurkan ini. Dapatkan paket usaha Fried Chicken kami sekarang dan mulailah meraih kesuksesan di dunia bisnis makanan. Nikmati setiap langkah perjalanan Anda dan saksikan bagaimana Fried Chicken kami memenangkan hati pelanggan Anda!",
                'foto' => 'chicken.jpg',
                'harga' => '3800000',
                'stok' => '10',
                'berkas_1' => 'sad.pdf',
                'berkas_2' => 'apaan.pdf',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Fried Chicken')
            ],
            [
                'id' => 'CKL001',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '2',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Queen Chocolate Milk',
                'deskripsi' => "Queen Chocolate Milk adalah paket usaha yang menghadirkan kenikmatan dan kelezatan sejati dalam segelas susu cokelat. Setiap tegukan dari susu cokelat kami yang lezat akan memanjakan lidah Anda dan membangkitkan kebahagiaan dalam setiap momen.\n\nDalam paket usaha Queen Chocolate Milk, kami memberikan peluang kepada Anda untuk memiliki bisnis yang sukses dan menguntungkan. Dengan nama produk yang sudah terkenal, Anda dapat memanfaatkan popularitas dan daya tariknya untuk menarik pelanggan loyal.\n\nKami menyediakan bahan-bahan berkualitas tinggi dan resep rahasia yang telah teruji untuk menciptakan rasa susu cokelat yang sempurna. Dengan komitmen kami terhadap kualitas dan cita rasa yang tak tertandingi, kami yakin Queen Chocolate Milk akan menjadi favorit di antara pecinta susu cokelat.\n\nDapatkan panduan lengkap untuk memulai bisnis Queen Chocolate Milk Anda sendiri. Kami akan memberikan resep rahasia, strategi pemasaran yang efektif, dan dukungan pelanggan yang responsif. Dengan dukungan ini, Anda dapat mengembangkan bisnis Anda tanpa hambatan.\n\nNikmati kesuksesan di dunia bisnis kuliner dengan memilih paket usaha Queen Chocolate Milk. Segera bergabung dengan kami dan hadirkan kebahagiaan lewat setiap tegukan Queen Chocolate Milk kepada pelanggan Anda!",
                'foto' => 'coklat.jpg',
                'harga' => '2450000',
                'stok' => '10',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Queen Chocolate Milk')
            ],

            // User Mail
            [
                'id' => 'T001',
                'users_id' => '923ewKLM',
                'kategoris_id' => '1',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Es Teh',
                'deskripsi' => "Es Teh adalah minuman segar yang siap menyegarkan Anda di saat-saat terpanas. Kami menyajikan Es Teh dengan cita rasa yang autentik dan kualitas yang terjamin.\n\nSetiap gelas Es Teh kami dipenuhi dengan teh berkualitas tinggi yang diseduh dengan hati-hati, kemudian disajikan dengan es batu yang melengkapi kelezatan minuman ini. Nikmati keharuman dan kelembutan teh yang terasa menyegarkan setiap tegukan.\n\nKami juga menyediakan variasi Es Teh dengan tambahan bahan-bahan segar, seperti potongan lemon, jeruk, atau mint yang akan memberikan sentuhan kesegaran ekstra. Anda dapat menyesuaikan tingkat manisnya sesuai dengan selera pribadi.\n\nKualitas adalah prioritas kami. Kami hanya menggunakan bahan-bahan berkualitas terbaik untuk menciptakan Es Teh yang autentik dan nikmat. Setiap tegukan akan membawa Anda pada pengalaman minum yang menyenangkan dan menyegarkan.\n\nNikmati kelezatan Es Teh kami dalam suasana yang nyaman dan santai. Dapatkan sensasi kesegaran yang memanjakan lidah Anda di tengah hiruk-pikuk kesibukan. Segera kunjungi tempat kami dan nikmati kenikmatan sejati dari Es Teh yang kami tawarkan.",
                'foto' => 'es_teh.jpg',
                'harga' => '2500000',
                'stok' => '10',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Es Teh')
            ],
            [
                'id' => 'K002',
                'users_id' => '923ewKLM',
                'kategoris_id' => '2',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Kopi',
                'deskripsi' => "Kopi adalah minuman penuh aroma dan kenikmatan yang siap membangunkan Anda dari pagi hari yang mengantuk. Kami menghadirkan Kopi dengan kualitas terbaik untuk memenuhi kebutuhan Anda akan cita rasa yang autentik.\n\nSetiap cangkir Kopi kami disajikan dengan biji kopi pilihan yang dipanggang dengan sempurna, menghasilkan rasa yang kaya dan aroma yang menggugah selera. Nikmati kehangatan dan kelezatan setiap tegukan Kopi kami.\n\nKami menyediakan berbagai varian Kopi, mulai dari Kopi hitam yang klasik, Kopi dengan susu, hingga Kopi dengan tambahan bahan-bahan unik untuk menciptakan rasa yang spesial. Anda juga dapat memilih tingkat kepekatan yang sesuai dengan selera pribadi.\n\nKualitas adalah hal yang kami jaga dengan sungguh-sungguh. Kami hanya menggunakan biji kopi terbaik yang diproses dengan hati-hati untuk menghasilkan Kopi yang berkualitas tinggi.",
                'foto' => 'kopi.jpg',
                'harga' => '8000000',
                'stok' => '10',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Kopi Set')
            ],


            // User Bang Saleh
            [
                'id' => 'LDY01',
                'users_id' => '923ewKLM',
                'kategoris_id' => '1',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Laundry',
                'deskripsi' => "Laundry adalah solusi terbaik untuk kebutuhan pencucian Anda. Dengan layanan kami yang profesional dan efisien, Anda dapat mengandalkan kami untuk membersihkan pakaian Anda dengan sempurna.\n\nKami menggunakan teknologi canggih dan bahan pembersih berkualitas untuk memastikan pakaian Anda bersih, harum, dan terawat dengan baik.\n\nKami mengerti betapa sibuknya jadwal Anda, itulah mengapa kami menawarkan layanan pengambilan dan pengantaran pakaian yang mudah dan praktis. Anda tidak perlu repot-repot datang ke tempat laundry, cukup hubungi kami dan kami akan menjemput pakaian kotor Anda. Setelah selesai dicuci, kami akan mengantarkan pakaian yang sudah bersih dan siap digunakan kembali.\n\nKualitas adalah prioritas utama kami. Tim kami yang berpengalaman dan terlatih secara profesional akan menangani pakaian Anda dengan hati-hati dan teliti. Kami memastikan bahwa setiap pakaian diperlakukan dengan perawatan yang tepat, termasuk pilihan deterjen yang sesuai dengan jenis bahan dan warna pakaian.\n\nKami juga menawarkan layanan tambahan seperti penyetrikaan, dry cleaning, dan perawatan khusus untuk pakaian yang membutuhkan perlakuan khusus. Anda dapat mempercayakan kami untuk memberikan hasil yang memuaskan dan pakaian yang tampak seperti baru.\n\nPercayakan kebutuhan pencucian Anda kepada kami dan nikmati kemudahan serta kepuasan yang kami tawarkan. Hubungi kami sekarang untuk mendapatkan layanan laundry terbaik dan menjaga pakaian Anda tetap bersih dan terawat dengan baik.",
                'foto' => 'laundry.jpeg',
                'harga' => '8000000',
                'stok' => '10',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Laundry Set')
            ],
            [
                'id' => 'LDY01',
                'users_id' => '923ewKLM',
                'kategoris_id' => '1',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Roti Bakar',
                'deskripsi' => "Roti Bakar adalah hidangan lezat yang siap memanjakan lidah Anda. Kami menyajikan roti bakar dengan berbagai pilihan rasa dan topping yang menggugah selera.\n\nSetiap potongan roti kami dipanggang dengan sempurna untuk menciptakan tekstur yang renyah di luar dan lembut di dalam. Tersedia beragam pilihan rasa, mulai dari rasa klasik seperti selai kacang atau selai stroberi.\n\nKami juga menawarkan berbagai pilihan topping untuk menambahkan cita rasa dan kelezatan pada roti bakar Anda. Anda dapat memilih antara taburan kacang, atau siraman saus manis yang menggoda.\n\nKualitas adalah prioritas kami. Kami menggunakan bahan-bahan segar dan berkualitas tinggi dalam setiap sajian roti bakar kami. Dengan perpaduan rasa yang sempurna dan tampilan yang menggoda, setiap gigitan akan memberikan kepuasan yang memanjakan lidah Anda.",
                'foto' => 'roti_bakar.jpg',
                'harga' => '8000000',
                'stok' => '10',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Roti Bakar')
            ],


            // User Naufal
            [
                'id' => 'WM001',
                'users_id' => 'NFLT0066',
                'kategoris_id' => '1',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Warmindo',
                'deskripsi' => "Warmindo adalah hidangan yang lezat dan memanjakan lidah untuk menghangatkan tubuh Anda di saat cuaca dingin atau saat Anda ingin menikmati hidangan yang menyenangkan. Kami menghadirkan Warmindo dengan berbagai variasi yang menggugah selera.\n\nSetiap mangkuk Warmindo kami disajikan dengan ramuan pilihan dan bumbu-bumbu yang khas, menciptakan rasa yang lezat dan memuaskan. Setiap suapan akan menghadirkan harmoni cita rasa yang kaya dan tekstur yang menggoda.\n\nKami menawarkan berbagai pilihan Warmindo, mulai dari Warmindo dengan kuah kental dan berbumbu hingga Warmindo dengan kuah segar yang menyegarkan. Anda dapat memilih tingkat kepedasan yang sesuai dengan selera Anda, sehingga setiap suapan akan memberikan sensasi yang menghangatkan dan kenikmatan yang tak terlupakan.\n\nKualitas adalah hal yang kami perhatikan dengan seksama. Kami menggunakan bahan-bahan segar dan berkualitas tinggi, serta resep yang teruji dan disempurnakan, untuk menghadirkan Warmindo yang istimewa. Dengan porsi yang melimpah, kami ingin memastikan bahwa Anda akan puas dan kenyang setelah menikmati hidangan kami.\n\nMari nikmati kelezatan Warmindo kami dalam suasana yang nyaman dan hangat. Datanglah ke restoran kami dan biarkan kami memanjakan Anda dengan hidangan Warmindo yang menggugah selera.",
                'foto' => 'warmindo.jpg',
                'harga' => '6190000',
                'stok' => '10',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Warmindo')
            ],
            [
                'id' => 'TT001',
                'users_id' => 'NFLT0066',
                'kategoris_id' => '1',
                'jenis' => 'paket_usaha',
                'nama_produk' => 'Thai Tea',
                'deskripsi' => "Nikmati sensasi kelezatan sejati dengan Thai Tea kami yang eksotis. Thai Tea adalah minuman khas Thailand yang memadukan teh hitam berkualitas tinggi dengan campuran susu kental manis dan gula. Rasanya yang unik dan aroma harumnya akan memanjakan lidah Anda.\n\nThai Tea kami disajikan dalam berbagai varian, mulai dari yang klasik hingga yang segar dengan tambahan es. Setiap tegukan Thai Tea kami akan memberikan pengalaman yang menyegarkan dan memuaskan.\n\nKami menggunakan bahan-bahan berkualitas terbaik dan meracik Thai Tea dengan hati-hati untuk menghadirkan cita rasa yang autentik. Nikmati keharmonisan antara rasa teh hitam yang kaya dengan kelembutan susu dan kelezatan gula yang pas.\n\nThai Tea kami juga bisa disesuaikan dengan tingkat manis yang Anda inginkan. Anda dapat menikmatinya dalam keadaan panas atau dingin, sesuai dengan preferensi Anda.\n\nJangan lewatkan kesempatan untuk merasakan kelezatan Thai Tea kami yang khas. Segera nikmati sensasi eksotis dan refresing dari Thai Tea yang kami tawarkan. Jadikan Thai Tea sebagai teman setia Anda dalam menikmati momen istimewa atau sebagai minuman penyegar di cuaca yang panas. Rasakan kenikmatan yang tak terlupakan dengan Thai Tea kami!",
                'foto' => 'thai_tea.jpg',
                'harga' => '2300000',
                'stok' => '10',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Thai Tea')
            ],


            // supply
            //Raihan 
            [
                'id' => 'AYM002',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '1',
                'jenis' => 'supply',
                'nama_produk' => 'Ayam fillet 1 kg dada',
                'deskripsi' => 'Ayam fillet segar dengan berat 1 kilogram. Dibuat dari ayam berkualitas tinggi dan diproses secara higienis. Rasakan kelezatan daging ayam fillet yang lembut dan juicy dalam setiap gigitannya. Cocok untuk berbagai resep masakan, seperti tumis, panggang, atau digunakan sebagai bahan dasar hidangan spesial Anda. Dapatkan kualitas terbaik dengan Ayam fillet 1 kg kami!',
                'foto' => 'fillet.jpg',
                'harga' => '60000',
                'stok' => '15',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Ayam fillet 1kg dada')
            ],
            [
                'id' => 'AYM003',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '1',
                'jenis' => 'supply',
                'nama_produk' => 'Minyak Sania 2L 6pcs',
                'deskripsi' => 'Minyak Sania 2L 6pcs adalah produk minyak berkualitas tinggi yang dikemas dalam kemasan botol berukuran 2 liter. Dengan kemasan berisi 6 botol, produk ini cocok untuk kebutuhan pasokan atau suplai dalam jumlah yang lebih besar. Minyak Sania hadir dengan formula khusus yang memberikan kelezatan dan kualitas terbaik untuk berbagai keperluan memasak.',
                'foto' => 'minyak_sania.jpeg',
                'harga' => '245000',
                'stok' => '24',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Minyak Sania 2L 6pcs')
            ],
            [
                'id' => 'AYM004',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '1',
                'jenis' => 'supply',
                'nama_produk' => 'Tepung Bumbu Kentucky Sasa 75gr/10pcs',
                'deskripsi' => "Tepung Bumbu Kentucky Sasa 75gr adalah tepung bumbu berkualitas dengan rasa khas Kentucky yang dikemas dalam kemasan 75 gram. Tepung bumbu ini cocok digunakan untuk memberikan cita rasa Kentucky yang lezat pada berbagai hidangan. Dengan kemasan yang praktis, produk ini merupakan pilihan tepat untuk memenuhi kebutuhan pasokan atau suplai dalam jumlah yang lebih besar. Berikan sentuhan istimewa pada hidangan Anda dengan Tepung Bumbu Kentucky Sasa 75gr.",
                'foto' => 'tepung.jpg',
                'harga' => '27500',
                'stok' => '24',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Minyak Sania 2L 6pcs')
            ],
            // coklat
            [
                'id' => 'CKL002',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '2',
                'jenis' => 'supply',
                'nama_produk' => 'Bubuk Belgian',
                'deskripsi' => 'Bubuk Belgian adalah bubuk coklat premium yang berkualitas tinggi, berasal langsung dari Belgia. Rasakan kelezatan dan aroma khas dari bubuk coklat ini yang akan memenuhi selera Anda.',
                'foto' => 'bubuk_belgian.jpg',
                'harga' => '55000',
                'stok' => '15',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Belgian Chocolate Bubuk')
            ],
            [
                'id' => 'CKL003',
                'users_id' => 'a8ek9665',
                'kategoris_id' => '2',
                'jenis' => 'supply',
                'nama_produk' => 'Bubuk Chocolate Silverqueen 1kg',
                'deskripsi' => 'Bubuk Chocolate Silverqueen adalah bubuk coklat berkualitas yang terinspirasi dari rasa lezat Silverqueen. Nikmati kelezatan coklat dengan aroma yang kaya dan tekstur yang lembut. Cocok digunakan untuk berbagai kreasi makanan dan minuman coklat yang menggugah selera.',
                'foto' => 'bubuk_choco_silverqueen.jpeg',
                'harga' => '60000',
                'stok' => '10',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'Konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Chocolate Silverqueen Bubuk')
            ],


            // Mail
            //Kopi 
            [
                'id' => 'K002',
                'users_id' => '923ewKLM',
                'kategoris_id' => '1',
                'jenis' => 'supply',
                'nama_produk' => 'Espresso_bubuk',
                'deskripsi' => "Tepung Bumbu Kentucky Sasa 75gr adalah tepung bumbu berkualitas dengan rasa khas Kentucky yang dikemas dalam kemasan 75 gram. Tepung bumbu ini cocok digunakan untuk memberikan cita rasa Kentucky yang lezat pada berbagai hidangan. Dengan kemasan yang praktis, produk ini merupakan pilihan tepat untuk memenuhi kebutuhan pasokan atau suplai dalam jumlah yang lebih besar. Berikan sentuhan istimewa pada hidangan Anda dengan Tepung Bumbu Kentucky Sasa 75gr.",
                'foto' => ' espresso_bubuk.jpeg',
                'harga' => '27500',
                'stok' => '24',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Espresso Bubuk')
            ],
            [
                'id' => 'K003',
                'users_id' => '923ewKLM',
                'kategoris_id' => '1',
                'jenis' => 'supply',
                'nama_produk' => 'worcas_luwak.jpeg',
                'deskripsi' => "Tepung Bumbu Kentucky Sasa 75gr adalah tepung bumbu berkualitas dengan rasa khas Kentucky yang dikemas dalam kemasan 75 gram. Tepung bumbu ini cocok digunakan untuk memberikan cita rasa Kentucky yang lezat pada berbagai hidangan. Dengan kemasan yang praktis, produk ini merupakan pilihan tepat untuk memenuhi kebutuhan pasokan atau suplai dalam jumlah yang lebih besar. Berikan sentuhan istimewa pada hidangan Anda dengan Tepung Bumbu Kentucky Sasa 75gr.",
                'foto' => ' espresso_bubuk.jpeg',
                'harga' => '27500',
                'stok' => '24',
                'berkas_1' => '',
                'berkas_2' => '',
                'berkas_3' => '',
                'status' => 'konfirmasi',
                'tampilkan' => '1',
                'slug' => Str::slug('Espresso Bubuk')
            ],


            //     //Teh 
            // tehpoci_jasmine.jpg,
            // tehpoci_vanilla.jpg

            // // Bang Saleh
            //     // Laundry
            //     daia_putih_1kardus_72sachet.jpg,
            //     hangar.jpg,
            //     soklin_softergen_1_kardus.jpg
            //     // Rotibakar
            //     nutella_600g.jpeg,
            //     roti_tawar_kasino.jpg,
            //     selai_blueberry.jpg,
            //     selai_strawberry.jpg

            // // Naufal
            //     // Thai tea
            //     lemontea_bubuk.jpg,
            //     thaitea_bubuk.jpg

            //     // Warmindo
            //     miegoreng_1dus_ayambawang.jpg,
            //     miegoreng_1dus_aceh.jpeg,
            //     miegoreng_1dus.jpg






        ];

        foreach ($produk as $item) {
            $item['slug'] = Str::slug($item['nama_produk']);
            Produk::create($item);
        }
    }
}
