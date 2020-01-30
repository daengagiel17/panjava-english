<?php

use Illuminate\Database\Seeder;
use App\Program;
use App\DetailProgram;
use App\Diskon;
use App\Jadwal;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'name' => 'English for Young Learner',
            'description' => 'Program ini cocok bagi anak-anak yang masih duduk di bangku SD ( 7-12 tahun ). Kita akan belajar dengan cara yang menyenangkan',
            'objective' => 'Atqui vocibus qualisque pri ex, no consul populo usu, ei regione omittam atomorum sea. At eos unum cibo maluisset. In mel erat minim constituam, te explicari dignissim inciderint eum, no vel intellegebat definitiones. Ex usu magna consetetur, sint nullam scriptorem ea pro. Est ei nobis legendos, veritus democritum eu vix. Eam ex laudem civibus, te duo malis movet consulatu. Essent eleifend an usu, eos at duis dolorem vivendum, ex idque concludaturque eum. Id eum sale elitr blandit, sea ne tation maluisset hendrerit. His an lorem adipisci, quo te eius mandamus constituto, no ius probo decore aperiam. Oratio utamur sit ne, verear dolorem voluptaria sed ut. Suas probo simul ut his, te mel omnes persius. Possit copiosae appareat eos cu, molestie antiopam gubergren pri ad, no per inani hendrerit concludaturque. Mea et adipiscing interpretaris. Aperiam pertinax in quo, quo an wisi eligendi splendide, quaestio mediocrem contentiones vim cu. Eum ne nisl habeo repudiare, soleat eleifend electram ad qui. At sale commune vulputate qui, mutat aperiam id eam. Ullum antiopam consulatu at his. Libris vocent ei sed. Duo brute nemore eu, simul luptatum expetenda ne sea.',
            'price' => '650000',
            'price_k' => '650K',
            'status' => true,
            'seat' => '20',
            'durasi' => '-',
            'category' => 'basic'
        ]);

        Program::create([
            'name' => 'Intensive English',
            'description' => 'Program ini cocok bagi kamu yang butuh materi khusus. Kita akan belajar materi sesuai dengan kemampuan dan kebutuhanmu',
            'objective' => 'Intensive English merupakan sebuah paket program pembelajaran Bahasa Inggris yang komprehensif. Program ini didesain menyesuaikan dengan kemampuan dan kebutuhan peserta dalam mempelajari Bahasa Inggris. Oleh karenanya, program ini dirancang dengan tiga (3) level pembelajaran yaitu, Basic (pemula), Intermadiate (menengah), dan Advance (ahli). Pada tahap awal pengembangan, kami membuka kelas Intensive English hanya pada Level Basic. Program ini sangat cocok bagi kamu yang ingin mulai memperlajari Bahasa Inggris secara intensif namun masih memiliki kemampuan Bahasa Inggris yang sangat terbatas. Selama proses pembelajaran, kamu akan dilatih untuk meningkatkan pembedaharaan kosa kata (vocabulary) melalui metode pembelajaran yang menyenangkan dan dipandu dengan jurnal pembelajaran harian. Tidak lupa kamu akan diajarkan untuk memahami beberapa tata bahasa (grammar) dasar. Selanjutnya kamu akan diajak untuk mulai terbiasa berinteraksi sederhana menggunakan Bahasa Inggris dengan langsung memasuki kelas Speaking, Listening, dan Reading. Pada akhir program kamu diharapakn sudah bisa berkomunikasi dengan Bahasa Inggris untuk kebutuhan interkasi dasar sehari-hari. Selain itu kamu juga diharapa sudah bisa memahami berbagai bacaan Bahasa Inggris sederhana yang juga dekat dengan kehidupan sehari-hari.',
            'price' => '650000',
            'price_k' => '650K',
            'status' => true,
            'seat' => '20',
            'durasi' => '18 Pertemuan (6 Minggu)',
            'category' => 'beginner'
        ]);

        Program::create([
            'name' => 'TOEFL Preparation',
            'description' => 'Program ini cocok bagi kamu yang ingin mengikuti tes TOEFL. Materinya kita fokuskan untuk persiapan menajalani tes tersebut',
            'objective' => 'Atqui vocibus qualisque pri ex, no consul populo usu, ei regione omittam atomorum sea. At eos unum cibo maluisset. In mel erat minim constituam, te explicari dignissim inciderint eum, no vel intellegebat definitiones. Ex usu magna consetetur, sint nullam scriptorem ea pro. Est ei nobis legendos, veritus democritum eu vix. Eam ex laudem civibus, te duo malis movet consulatu. Essent eleifend an usu, eos at duis dolorem vivendum, ex idque concludaturque eum. Id eum sale elitr blandit, sea ne tation maluisset hendrerit. His an lorem adipisci, quo te eius mandamus constituto, no ius probo decore aperiam. Oratio utamur sit ne, verear dolorem voluptaria sed ut. Suas probo simul ut his, te mel omnes persius. Possit copiosae appareat eos cu, molestie antiopam gubergren pri ad, no per inani hendrerit concludaturque. Mea et adipiscing interpretaris. Aperiam pertinax in quo, quo an wisi eligendi splendide, quaestio mediocrem contentiones vim cu. Eum ne nisl habeo repudiare, soleat eleifend electram ad qui. At sale commune vulputate qui, mutat aperiam id eam. Ullum antiopam consulatu at his. Libris vocent ei sed. Duo brute nemore eu, simul luptatum expetenda ne sea.',
            'price' => '650000',
            'price_k' => '650K',
            'status' => true,
            'seat' => '20',
            'durasi' => '18 Pertemuan (3 Minggu)',
            'category' => 'basic'
        ]);

        Program::create([
            'name' => 'IELTS Preparation',
            'description' => 'Program ini cocok bagi kamu yang ingin mengikuti tes IELTS. Materinya kita fokuskan untuk persiapan menajalani tes tersebut',
            'objective' => 'Atqui vocibus qualisque pri ex, no consul populo usu, ei regione omittam atomorum sea. At eos unum cibo maluisset. In mel erat minim constituam, te explicari dignissim inciderint eum, no vel intellegebat definitiones. Ex usu magna consetetur, sint nullam scriptorem ea pro. Est ei nobis legendos, veritus democritum eu vix. Eam ex laudem civibus, te duo malis movet consulatu. Essent eleifend an usu, eos at duis dolorem vivendum, ex idque concludaturque eum. Id eum sale elitr blandit, sea ne tation maluisset hendrerit. His an lorem adipisci, quo te eius mandamus constituto, no ius probo decore aperiam. Oratio utamur sit ne, verear dolorem voluptaria sed ut. Suas probo simul ut his, te mel omnes persius. Possit copiosae appareat eos cu, molestie antiopam gubergren pri ad, no per inani hendrerit concludaturque. Mea et adipiscing interpretaris. Aperiam pertinax in quo, quo an wisi eligendi splendide, quaestio mediocrem contentiones vim cu. Eum ne nisl habeo repudiare, soleat eleifend electram ad qui. At sale commune vulputate qui, mutat aperiam id eam. Ullum antiopam consulatu at his. Libris vocent ei sed. Duo brute nemore eu, simul luptatum expetenda ne sea.',
            'price' => '650000',
            'price_k' => '650K',
            'status' => true,
            'seat' => '20',
            'durasi' => '-',
            'category' => 'basic'
        ]);

        $details = [
            'Introduction',
            'Basics of HTML',
            'Getting Know about HTML',
            'Tags and Attributes',
            'Basics of CSS',
        ];

        for($i=1 ; $i<4 ; $i++)
        {
            foreach ($details as $key => $detail)
            {
                DetailProgram::create([
                    'program_id' => $i,
                    'name' => $detail
                ]);
            }
        }

        Diskon::create([
            'program_id' => 1,
            'status' => true,
            'banyak' => 3,
            'batas' => 4,
            'price' => '600000',
            'price_k' => '600K',
            'tanggal_awal' => date_create('2019-10-10'),
            'tanggal_akhir' => date_create('2019-10-30')
        ]);

        Diskon::create([
            'program_id' => 1,
            'status' => true,
            'banyak' => 5,
            'batas' => 7,
            'price' => '575000',
            'price_k' => '575K',
            'tanggal_awal' => date_create('2019-10-10'),
            'tanggal_akhir' => date_create('2019-10-30')
        ]);

        Diskon::create([
            'program_id' => 1,
            'status' => true,
            'banyak' => 8,
            'batas' => 10,
            'price' => '550000',
            'price_k' => '550K',
            'tanggal_awal' => date_create('2019-10-10'),
            'tanggal_akhir' => date_create('2019-10-30')
        ]);

        Diskon::create([
            'program_id' => 2,
            'status' => true,
            'banyak' => 3,
            'batas' => 4,
            'price' => '600000',
            'price_k' => '600K',
            'tanggal_awal' => date_create('2019-10-10'),
            'tanggal_akhir' => date_create('2019-10-30')
        ]);

        Diskon::create([
            'program_id' => 2,
            'status' => true,
            'banyak' => 5,
            'batas' => 7,
            'price' => '575000',
            'price_k' => '575K',
            'tanggal_awal' => date_create('2019-10-10'),
            'tanggal_akhir' => date_create('2019-10-30')
        ]);

        Diskon::create([
            'program_id' => 2,
            'status' => true,
            'banyak' => 8,
            'batas' => 10,
            'price' => '550000',
            'price_k' => '550K',
            'tanggal_awal' => date_create('2019-10-10'),
            'tanggal_akhir' => date_create('2019-10-30')
        ]);

        Jadwal::create([
            'program_id' => 2,
            'hari' => 'Senin, Rabu, dan Jumat',
            'kelas' => 'Kelas A',
            'waktu' => '15:30 - 17:00',
        ]);

        Jadwal::create([
            'program_id' => 2,
            'hari' => 'Senin, Rabu, dan Jumat',
            'kelas' => 'Kelas B',
            'waktu' => '18:30 - 20:00',
        ]);

        Jadwal::create([
            'program_id' => 2,
            'hari' => 'Selasa, Kamis, dan Sabtu',
            'kelas' => 'Kelas C',
            'waktu' => '15:30 - 17:00',
        ]);

        Jadwal::create([
            'program_id' => 2,
            'hari' => 'Selasa, Kamis, dan Sabtu',
            'kelas' => 'Kelas D',
            'waktu' => '18:30 - 20:00',
        ]);

        Jadwal::create([
            'program_id' => 3,
            'hari' => 'Senin - Jumat',
            'kelas' => 'Kelas A',
            'waktu' => '15:30 - 17:00',
        ]);
        
        Jadwal::create([
            'program_id' => 3,
            'hari' => 'Senin - Jumat',
            'kelas' => 'Kelas B',
            'waktu' => '18:30 - 20:00',
        ]);
    }
}