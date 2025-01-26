<?php

namespace Database\Factories;

use App\Core\Enums\CashFlow;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => ucwords($this->faker->unique()->words(2, true)),
            'description' => $this->faker->sentence,
            'scope' => $this->faker->randomElement(['project', 'resume_skill']),
        ];
    }

    public function createSampleCategories()
    {
        $sampleCategories = [
            [
                'name' => 'Web Development',
                'description' => 'All about building websites and web applications.',
                'scope' => 'project',
            ],
            [
                'name' => 'Graphic Design',
                'description' => 'Creating visual content to communicate messages.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'Data Science',
                'description' => 'Using scientific methods to extract insights from data.',
                'scope' => 'project',
            ],
            [
                'name' => 'Digital Marketing',
                'description' => 'Promoting products or brands via digital channels.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Creating software applications for mobile devices.',
                'scope' => 'project',
            ],
            [
                'name' => 'SEO Optimization',
                'description' => 'Improving the visibility of a website in search engines.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'Machine Learning',
                'description' => 'A subset of AI that focuses on building systems that learn from data.',
                'scope' => 'project',
            ],
            [
                'name' => 'Content Writing',
                'description' => 'Creating written content for various platforms.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'Designing user interfaces and experiences for applications.',
                'scope' => 'project',
            ],
            [
                'name' => 'Cloud Computing',
                'description' => 'Using remote servers hosted on the internet to store, manage, and process data.',
                'scope' => 'resume_skill',
            ],
            [
                'name' => 'Salary',
                'scope' => 'transaction',
                'type' => CashFlow::Income,
                'description' => 'Pendapatan tetap yang diterima secara berkala dari pekerjaan atau jabatan yang dijalani.'
            ],
            [
                'name' => 'Petty Cash',
                'scope' => 'transaction',
                'type' => CashFlow::Income,
                'description' => 'Uang tunai kecil yang diterima untuk keperluan sehari-hari atau pengeluaran kecil, seperti pengembalian biaya atau sumbangan.'
            ],
            [
                'name' => 'Minor Income',
                'scope' => 'transaction',
                'parent_id' => 12,
                'type' => CashFlow::Income,
                'description' => 'Mencakup semua pendapatan kecil yang diterima oleh perusahaan, seperti pengembalian biaya, sumbangan, atau pendapatan dari kegiatan promosi kecil.'
            ],
            [
                'name' => 'Petty Cash',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran kecil yang dilakukan untuk kebutuhan operasional sehari-hari, seperti pembelian alat tulis, makanan, atau biaya transportasi.'
            ],
            [
                'name' => 'Daily Expenses',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Mencakup semua pengeluaran kecil yang dilakukan setiap hari, seperti pembelian alat tulis, snack, atau kebutuhan operasional lainnya yang tidak memerlukan proses pengadaan formal.'
            ],
            [
                'name' => 'Transportation Costs',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Menyediakan dana untuk pengeluaran transportasi karyawan, seperti biaya parkir, tiket transportasi umum, atau penggantian biaya perjalanan dinas yang bersifat mendesak.'
            ],
            [
                'name' => 'Food and Beverage Expenses',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Digunakan untuk membiayai konsumsi makanan dan minuman dalam acara-acara kecil, rapat, atau kegiatan internal perusahaan yang tidak memerlukan anggaran besar.'
            ],
            [
                'name' => 'Minor Repairs',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Menangani pengeluaran untuk perbaikan kecil di kantor, seperti perbaikan peralatan, pemeliharaan fasilitas, atau penggantian barang yang rusak.'
            ],
            [
                'name' => 'Employee Social and Welfare Activities',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Dana yang dialokasikan untuk kegiatan sosial, seperti perayaan ulang tahun karyawan, acara kebersamaan, atau kegiatan kesejahteraan lainnya yang mendukung moral dan semangat tim.'
            ],
            [
                'name' => 'Unexpected Purchases',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Menyediakan dana untuk pembelian barang atau kebutuhan mendesak yang tidak terduga, seperti alat bantu kerja atau perlengkapan darurat.'
            ],
            [
                'name' => 'Minor Administrative Costs',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Mencakup pengeluaran untuk biaya administrasi yang bersifat kecil, seperti biaya pengiriman dokumen, fotokopi, atau biaya layanan kecil lainnya.'
            ],
            [
                'name' => 'Promotional Expenses',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Digunakan untuk biaya terkait kegiatan promosi kecil, seperti pembelian brosur, spanduk, atau materi pemasaran lainnya.'
            ],
            [
                'name' => 'Health and Safety Expenses',
                'scope' => 'transaction',
                'parent_id' => 14,
                'type' => CashFlow::Expense,
                'description' => 'Dana yang digunakan untuk pengeluaran terkait kesehatan dan keselamatan di tempat kerja, seperti pembelian alat pertolongan pertama atau perlengkapan keselamatan.'
            ],
            [
                'name' => 'Bonus',
                'scope' => 'transaction',
                'type' => CashFlow::Income,
                'description' => 'Penghasilan tambahan yang diberikan sebagai penghargaan atas kinerja atau pencapaian tertentu.'
            ],
            [
                'name' => 'Other',
                'scope' => 'transaction',
                'type' => CashFlow::Income,
                'description' => 'Sumber pendapatan lain yang tidak termasuk dalam kategori.'
            ],
            [
                'name' => 'Food & Drink',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran untuk makanan dan minuman, baik untuk konsumsi sehari-hari maupun acara khusus.'
            ],
            [
                'name' => 'Transportation',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran terkait biaya transportasi, termasuk perjalanan dengan kendaraan pribadi, transportasi umum (bus, kereta, taksi), bahan bakar, parkir, dan pemeliharaan kendaraan, baik untuk keperluan pribadi maupun bisnis.'
            ],
            [
                'name' => 'Daily Needs',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran untuk kebutuhan sehari-hari, seperti sabun, shampoo, dan barang-barang rumah tangga.'
            ],
            [
                'name' => 'Clothes',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran untuk pakaian dan aksesori, baik untuk kebutuhan sehari-hari maupun acara tertentu.'
            ],
            [
                'name' => 'Health',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran untuk kesehatan, termasuk biaya obat-obatan, pemeriksaan medis, dan asuransi kesehatan.'
            ],
            [
                'name' => 'Education',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran untuk pendidikan, seperti biaya sekolah, buku, dan kursus tambahan.'
            ],
            [
                'name' => 'Gift',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran untuk hadiah yang diberikan kepada orang lain dalam berbagai kesempatan.'
            ],
            [
                'name' => 'Other',
                'scope' => 'transaction',
                'type' => CashFlow::Expense,
                'description' => 'Pengeluaran lain yang tidak termasuk dalam kategori.'
            ],
            [
                'name' => 'Base Salary',
                'scope' => 'transaction',
                'parent_id' => 11,
                'type' => CashFlow::Expense,
                'description' => 'Gaji pokok yang diterima karyawan sebelum potongan pajak dan tunjangan lainnya.'
            ],
            [
                'name' => 'Overtime Pay',
                'scope' => 'transaction',
                'parent_id' => 11,
                'type' => CashFlow::Income,
                'description' => 'Pembayaran tambahan untuk jam kerja yang melebihi jam kerja reguler.'
            ],
            [
                'name' => 'Commission',
                'scope' => 'transaction',
                'parent_id' => 11,
                'type' => CashFlow::Income,
                'description' => 'Pendapatan yang diperoleh dari penjualan atau pencapaian target tertentu.'
            ],
            [
                'name' => 'Allowances',
                'scope' => 'transaction',
                'parent_id' => 11,
                'type' => CashFlow::Income,
                'description' => 'Tunjangan yang diberikan, seperti tunjangan transportasi, makan, atau perumahan.'
            ],
            [
                'name' => 'Performance Bonus',
                'scope' => 'transaction',
                'parent_id' => 11,
                'type' => CashFlow::Income,
                'description' => 'Bonus yang diberikan berdasarkan kinerja individu atau tim selama periode tertentu.'
            ],
            [
                'name' => 'Holiday Pay',
                'scope' => 'transaction',
                'parent_id' => 11,
                'type' => CashFlow::Income,
                'description' => 'Pembayaran tambahan untuk bekerja pada hari libur atau cuti bersama.'
            ],
            [
                'name' => 'Severance Pay',
                'scope' => 'transaction',
                'parent_id' => 11,
                'type' => CashFlow::Income,
                'description' => 'Pembayaran yang diberikan kepada karyawan yang dipecat atau mengundurkan diri.'
            ],
        ];

        foreach ($sampleCategories as $category) {
            Category::create($category);
        }
    }
}
