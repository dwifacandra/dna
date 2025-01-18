<?php

namespace Database\Factories;

use App\Models\ResumeCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeCompanyFactory extends Factory
{
    protected $model = ResumeCompany::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'url' => $this->faker->url,
            'logo' => 'resumes/company/logo/default.svg',
        ];
    }

    public function sampleCompanies()
    {
        return [
            [
                'name' => 'Gojek',
                'description' => 'An on-demand multi-service platform and digital payment technology group based in Indonesia.',
                'url' => 'https://www.gojek.com',
                'logo' => 'resumes/company/logo/gojek.svg',
            ],
            [
                'name' => 'OVO',
                'description' => 'A digital payment and financial services platform in Indonesia offering e-wallet services.',
                'url' => 'https://www.ovo.id',
                'logo' => 'resumes/company/logo/ovo.svg',
            ],
            [
                'name' => 'Dana',
                'description' => 'A digital wallet service in Indonesia that allows users to make payments and manage finances.',
                'url' => 'https://www.dana.id',
                'logo' => 'resumes/company/logo/dana.svg',
            ],
            [
                'name' => 'LinkAja',
                'description' => 'A digital payment service in Indonesia providing secure transactions and financial management.',
                'url' => 'https://www.linkaja.id',
                'logo' => 'resumes/company/logo/linkaja.svg',
            ],
            [
                'name' => 'Blibli',
                'description' => 'An Indonesian e-commerce platform connecting buyers and sellers for online shopping.',
                'url' => 'https://www.blibli.com',
                'logo' => 'resumes/company/logo/blibli.svg',
            ],
            [
                'name' => 'Zalora',
                'description' => 'An online fashion retailer in Southeast Asia offering a wide range of clothing and accessories.',
                'url' => 'https://www.zalora.com',
                'logo' => 'resumes/company/logo/zalora.svg',
            ],
            [
                'name' => 'Lazada',
                'description' => 'A leading e-commerce platform in Southeast Asia for buying and selling products online.',
                'url' => 'https://www.lazada.com',
                'logo' => 'resumes/company/logo/lazada.svg',
            ],
            [
                'name' => 'JD.id',
                'description' => 'An online shopping platform in Indonesia offering a wide range of products.',
                'url' => 'https://www.jd.id',
                'logo' => 'resumes/company/logo/jd-com.svg',
            ],
            [
                'name' => 'Bhinneka',
                'description' => 'An Indonesian e-commerce site specializing in electronics and IT products.',
                'url' => 'https://www.bhinneka.com',
                'logo' => 'resumes/company/logo/bhinneka.svg',
            ],
            [
                'name' => 'Bukalapak',
                'description' => 'One of Indonesian largest online marketplaces connecting buyers and sellers.',
                'url' => 'https://www.bukalapak.com',
                'logo' => 'resumes/company/logo/bukalapak.svg',
            ],
            [
                'name' => 'Traveloka',
                'description' => 'An online travel agency in Indonesia offering flight and hotel bookings.',
                'url' => 'https://www.traveloka.com',
                'logo' => 'resumes/company/logo/traveloka.svg',
            ],
            [
                'name' => 'Shopee',
                'description' => 'A popular e-commerce platform in Southeast Asia for buying and selling products.',
                'url' => 'https://shopee.com',
                'logo' => 'resumes/company/logo/shopee.svg',
            ],
            [
                'name' => 'Tokopedia',
                'description' => 'An Indonesian technology company operating a marketplace platform for online stores.',
                'url' => 'https://www.tokopedia.com',
                'logo' => 'resumes/company/logo/tokopedia.svg',
            ],
            [
                'name' => 'Google',
                'description' => 'A multinational technology company specializing in Internet-related services and products.',
                'url' => 'https://www.google.com',
                'logo' => 'resumes/company/logo/google.svg',
            ],
            [
                'name' => 'Microsoft',
                'description' => 'A global technology company known for its software products and services.',
                'url' => 'https://www.microsoft.com',
                'logo' => 'resumes/company/logo/microsoft.svg',
            ],
            [
                'name' => 'Apple',
                'description' => 'A leading technology company that designs and manufactures consumer electronics and software.',
                'url' => 'https://www.apple.com',
                'logo' => 'resumes/company/logo/apple.svg',
            ],
            [
                'name' => 'Amazon',
                'description' => 'A multinational technology company focusing on e-commerce and cloud computing.',
                'url' => 'https://www.amazon.com',
                'logo' => 'resumes/company/logo/amazon.svg',
            ],
            [
                'name' => 'Facebook',
                'description' => 'A social media platform that connects people and allows content sharing.',
                'url' => 'https://www.facebook.com',
                'logo' => 'resumes/company/logo/facebook.svg',
            ],
            [
                'name' => 'Instagram',
                'description' => 'A photo and video sharing social networking service owned by Facebook.',
                'url' => 'https://www.instagram.com',
                'logo' => 'resumes/company/logo/instagram.svg',
            ],
            [
                'name' => 'Linkedin',
                'description' => 'A professional networking platform connecting job seekers and employers.',
                'url' => 'https://www.linkedin.com',
                'logo' => 'resumes/company/logo/linkedin.svg',
            ],
            [
                'name' => 'Docker',
                'description' => 'A platform for developing and running applications in containers.',
                'url' => 'https://www.docker.com',
                'logo' => 'resumes/company/logo/docker.svg',
            ],
            [
                'name' => 'AWS',
                'description' => 'Amazon Web Services providing on-demand cloud computing platforms.',
                'url' => 'https://aws.amazon.com',
                'logo' => 'resumes/company/logo/aws.svg',
            ],
            [
                'name' => 'Azure',
                'description' => 'Microsoft Azure, a cloud computing service for building and managing applications.',
                'url' => 'https://azure.microsoft.com',
                'logo' => 'resumes/company/logo/azure.svg',
            ],
            [
                'name' => 'MongoDB',
                'description' => 'A document-oriented NoSQL database known for its flexibility and scalability.',
                'url' => 'https://www.mongodb.com',
                'logo' => 'resumes/company/logo/mongodb.svg',
            ],
            [
                'name' => 'MySQL',
                'description' => 'An open-source relational database management system widely used for web applications.',
                'url' => 'https://www.mysql.com',
                'logo' => 'resumes/company/logo/mysql.svg',
            ],
        ];
    }

    public function createSampleCompanies()
    {
        foreach ($this->sampleCompanies() as $company) {
            ResumeCompany::firstOrCreate(['name' => $company['name']], $company);
        }
    }
}
