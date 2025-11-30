<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 5 User 
        $users = [
            ['name' => 'Budi Santoso', 'username' => 'budisantoso', 'email' => 'budi@example.com'],
            ['name' => 'Siti Nurhaliza', 'username' => 'sitinur', 'email' => 'siti@example.com'],
            ['name' => 'Ahmad Rizki', 'username' => 'ahmadrizki', 'email' => 'ahmad@example.com'],
            ['name' => 'Dewi Lestari', 'username' => 'dewilestari', 'email' => 'dewi@example.com'],
            ['name' => 'Andi Pratama', 'username' => 'andipratama', 'email' => 'andi@example.com'],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'username' => $userData['username'],
                'email' => $userData['email'],
                'password' => bcrypt('password'),
            ]);
        }

        // Membuat 2 Category
        $teknologi = Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);

        $pendidikan = Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan',
        ]);

        // Membuat 10 Posts 
        $postsData = [
            [
                'title' => 'Perkembangan Artificial Intelligence di Indonesia',
                'user_id' => 1,
                'category_id' => $teknologi->id,
                'excerpt' => 'AI semakin berkembang pesat di Indonesia dengan berbagai implementasi di berbagai sektor industri dan pendidikan.',
                'body' => 'Artificial Intelligence atau Kecerdasan Buatan telah menjadi topik yang sangat menarik dalam beberapa tahun terakhir. Di Indonesia, perkembangan AI mulai terlihat dengan munculnya berbagai startup teknologi yang mengimplementasikan AI dalam solusi bisnis mereka. Dari chatbot customer service hingga sistem rekomendasi e-commerce, AI telah mengubah cara kita berinteraksi dengan teknologi. Pemerintah Indonesia juga mulai mendorong pengembangan AI melalui berbagai program dan inisiatif nasional.',
            ],
            [
                'title' => 'Metode Pembelajaran Aktif untuk Generasi Z',
                'user_id' => 2,
                'category_id' => $pendidikan->id,
                'excerpt' => 'Strategi pembelajaran modern yang efektif untuk siswa generasi Z dengan memanfaatkan teknologi digital.',
                'body' => 'Generasi Z memiliki karakteristik unik dalam cara mereka belajar. Mereka adalah digital natives yang tumbuh dengan teknologi di ujung jari mereka. Metode pembelajaran aktif seperti project-based learning, flipped classroom, dan gamifikasi terbukti lebih efektif untuk generasi ini. Guru perlu mengadaptasi pendekatan mengajar mereka dengan mengintegrasikan teknologi dan menciptakan pengalaman belajar yang interaktif dan engaging.',
            ],
            [
                'title' => 'Revolusi Internet of Things dalam Kehidupan Sehari-hari',
                'user_id' => 3,
                'category_id' => $teknologi->id,
                'excerpt' => 'IoT mengubah cara kita berinteraksi dengan perangkat di rumah dan lingkungan sekitar kita.',
                'body' => 'Internet of Things (IoT) telah membawa perubahan signifikan dalam kehidupan sehari-hari. Dari smart home yang dapat dikontrol melalui smartphone, hingga wearable devices yang memantau kesehatan kita, IoT membuat hidup lebih efisien dan nyaman. Di Indonesia, adopsi IoT terus meningkat dengan semakin banyaknya perusahaan yang menawarkan solusi smart home dan smart city.',
            ],
            [
                'title' => 'Pentingnya Literasi Digital di Era Modern',
                'user_id' => 4,
                'category_id' => $pendidikan->id,
                'excerpt' => 'Literasi digital bukan hanya tentang menggunakan teknologi, tapi memahami dan menggunakannya secara bijak.',
                'body' => 'Di era digital ini, literasi digital menjadi keterampilan fundamental yang harus dimiliki setiap orang. Literasi digital mencakup kemampuan untuk mencari, mengevaluasi, dan menggunakan informasi dari sumber digital secara efektif. Ini juga termasuk pemahaman tentang keamanan online, privasi data, dan etika digital. Sekolah-sekolah di Indonesia mulai memasukkan literasi digital dalam kurikulum mereka untuk mempersiapkan siswa menghadapi tantangan masa depan.',
            ],
            [
                'title' => 'Cloud Computing untuk Bisnis UKM Indonesia',
                'user_id' => 5,
                'category_id' => $teknologi->id,
                'excerpt' => 'Bagaimana cloud computing dapat membantu UKM Indonesia berkembang dan bersaing di era digital.',
                'body' => 'Cloud computing telah menjadi game changer bagi UKM di Indonesia. Dengan cloud, UKM dapat mengakses teknologi enterprise tanpa harus mengeluarkan investasi besar untuk infrastruktur IT. Dari penyimpanan data hingga aplikasi bisnis, semuanya dapat diakses melalui internet dengan biaya yang terjangkau. Ini memungkinkan UKM untuk fokus pada pertumbuhan bisnis mereka sambil memanfaatkan teknologi modern.',
            ],
            [
                'title' => 'Strategi Belajar Efektif untuk Ujian Nasional',
                'user_id' => 1,
                'category_id' => $pendidikan->id,
                'excerpt' => 'Tips dan trik belajar yang terbukti efektif untuk menghadapi ujian nasional dengan percaya diri.',
                'body' => 'Mempersiapkan ujian nasional membutuhkan strategi yang tepat. Mulai dari membuat jadwal belajar yang teratur, menggunakan teknik pomodoro untuk menjaga fokus, hingga melakukan latihan soal secara konsisten. Penting juga untuk menjaga kesehatan fisik dan mental selama masa persiapan. Dengan strategi yang tepat, siswa dapat menghadapi ujian dengan lebih percaya diri dan mencapai hasil yang maksimal.',
            ],
            [
                'title' => 'Keamanan Siber di Era Digital Indonesia',
                'user_id' => 2,
                'category_id' => $teknologi->id,
                'excerpt' => 'Ancaman keamanan siber semakin meningkat, pelajari cara melindungi data pribadi Anda.',
                'body' => 'Keamanan siber menjadi isu yang semakin krusial di Indonesia seiring meningkatnya pengguna internet dan transaksi digital. Ancaman seperti phishing, malware, dan ransomware terus berkembang. Penting bagi setiap pengguna internet untuk memahami dasar-dasar keamanan siber, seperti menggunakan password yang kuat, mengaktifkan two-factor authentication, dan berhati-hati dengan email mencurigakan. Perusahaan juga harus menginvestasikan sumber daya dalam keamanan siber untuk melindungi data pelanggan mereka.',
            ],
            [
                'title' => 'Pembelajaran Jarak Jauh Pasca Pandemi',
                'user_id' => 3,
                'category_id' => $pendidikan->id,
                'excerpt' => 'Transformasi pendidikan dengan pembelajaran hybrid yang menggabungkan online dan offline.',
                'body' => 'Pandemi COVID-19 telah mengubah lanskap pendidikan secara permanen. Pembelajaran jarak jauh yang awalnya dipaksa oleh keadaan, kini menjadi bagian integral dari sistem pendidikan. Banyak institusi pendidikan mengadopsi model hybrid yang menggabungkan pembelajaran tatap muka dan online. Ini memberikan fleksibilitas lebih bagi siswa sambil tetap mempertahankan interaksi sosial yang penting untuk perkembangan mereka.',
            ],
            [
                'title' => 'Teknologi 5G dan Dampaknya di Indonesia',
                'user_id' => 4,
                'category_id' => $teknologi->id,
                'excerpt' => 'Jaringan 5G membawa kecepatan dan konektivitas baru yang akan mengubah berbagai industri.',
                'body' => 'Teknologi 5G mulai hadir di Indonesia dengan janji kecepatan internet yang jauh lebih tinggi dan latency yang lebih rendah. Ini akan membuka peluang baru untuk teknologi seperti autonomous vehicles, telemedicine, dan augmented reality. Industri manufaktur, transportasi, dan kesehatan diperkirakan akan mendapat manfaat besar dari implementasi 5G. Meskipun masih dalam tahap awal, potensi 5G untuk mengubah cara kita hidup dan bekerja sangat besar.',
            ],
            [
                'title' => 'Kurikulum Merdeka dalam Sistem Pendidikan Indonesia',
                'user_id' => 5,
                'category_id' => $pendidikan->id,
                'excerpt' => 'Konsep Kurikulum Merdeka memberikan fleksibilitas lebih bagi guru dan siswa dalam proses pembelajaran.',
                'body' => 'Kurikulum Merdeka adalah inovasi terbaru dalam sistem pendidikan Indonesia yang memberikan kebebasan lebih kepada sekolah dan guru untuk merancang pembelajaran sesuai dengan kebutuhan siswa. Fokusnya adalah pada pengembangan kompetensi, bukan hanya penguasaan materi. Kurikulum ini mendorong pembelajaran yang lebih kontekstual, kolaboratif, dan berpusat pada siswa. Dengan Kurikulum Merdeka, diharapkan siswa dapat mengembangkan potensi mereka secara optimal.',
            ],
        ];

        foreach ($postsData as $postData) {
            Post::create([
                'title' => $postData['title'],
                'slug' => \Illuminate\Support\Str::slug($postData['title']),
                'user_id' => $postData['user_id'],
                'category_id' => $postData['category_id'],
                'excerpt' => $postData['excerpt'],
                'body' => $postData['body'],
            ]);
        }
    }
}
