<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel resume_companies
        Schema::create('resume_companies', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name', 50); // Nama perusahaan
            $table->string('description', 255)->nullable(); // Deskripsi perusahaan
            $table->string('url', 100)->nullable(); // Tautan perusahaan
            $table->string('logo', 100)->nullable(); // Logo perusahaan (file path or URL)
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });

        // Membuat tabel resume_experiences
        Schema::create('resume_experiences', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('company_id')
                ->constrained('resume_companies')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // Foreign key
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade') // Menghapus record di user_accounts jika user dihapus
                ->onUpdate('cascade'); // Memperbarui user_id di user_accounts jika id di users diperbarui
            $table->string('job_title', 50); // Judul pekerjaan
            $table->string('description', 255)->nullable(); // Deskripsi pekerjaan
            $table->string('country', 50)->nullable(); // Negara
            $table->string('province', 50)->nullable(); // Provinsi
            $table->string('regency', 50)->nullable(); // Kabupaten/Kota
            $table->string('job_type', 20)->nullable(); // Tipe pekerjaan
            $table->string('location_type', 20)->nullable(); // Tipe lokasi
            $table->date('start_date')->nullable(); // Tanggal mulai
            $table->date('end_date')->nullable(); // Tanggal berakhir
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });

        // Membuat tabel resume_skills
        Schema::create('resume_skills', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade') // Menghapus record di user_accounts jika user dihapus
                ->onUpdate('cascade'); // Memperbarui user_id di user_accounts jika id di users diperbarui
            $table->string('name', 50); // Nama keterampilan
            $table->string('icon', 20)->nullable(); // Ikon keterampilan
            $table->string('icon_color', 8)->nullable(); // Ikon keterampilan
            $table->integer('rate')->nullable(); // Tingkat keterampilan
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });

        // Membuat tabel user_accounts
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade') // Menghapus record di user_accounts jika user dihapus
                ->onUpdate('cascade'); // Memperbarui user_id di user_accounts jika id di users diperbarui
            $table->string('name', 50)->nullable(); // Nama akun
            $table->string('url', 100)->nullable(); // Tautan akun
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_accounts');
        Schema::dropIfExists('resume_skills');
        Schema::dropIfExists('resume_experiences');
        Schema::dropIfExists('resume_companies');
    }
}
