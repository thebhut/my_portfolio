<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        \App\Models\User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // Skills & Categories
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\Skill::truncate();
        \App\Models\SkillCategory::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $categories = [
            'Programming Languages' => [
                ['name' => 'Python', 'proficiency' => 90, 'icon' => '🐍'],
                ['name' => 'Go lang', 'proficiency' => 85, 'icon' => '🔵'],
            ],
            'Frameworks' => [
                ['name' => 'TensorFlow', 'proficiency' => 85, 'icon' => '🧠'],
                ['name' => 'PyTorch', 'proficiency' => 85, 'icon' => '🔥'],
                ['name' => 'Scikit-learn', 'proficiency' => 80, 'icon' => '🔬'],
                ['name' => 'NLTK', 'proficiency' => 75, 'icon' => '📚'],
                ['name' => 'OpenCV', 'proficiency' => 80, 'icon' => '👁️'],
                ['name' => 'LangChain', 'proficiency' => 85, 'icon' => '🦜'],
                ['name' => 'LlamaIndex', 'proficiency' => 80, 'icon' => '🦙'],
            ],
            'Databases' => [
                ['name' => 'MySQL', 'proficiency' => 90, 'icon' => '🐬'],
                ['name' => 'PostgreSQL', 'proficiency' => 88, 'icon' => '🐘'],
                ['name' => 'MongoDB', 'proficiency' => 85, 'icon' => '🍃'],
                ['name' => 'Vector DB', 'proficiency' => 80, 'icon' => '📊'],
                ['name' => 'Graph DB', 'proficiency' => 75, 'icon' => '🕸️'],
                ['name' => 'Firebase', 'proficiency' => 85, 'icon' => '🔥'],
            ]
        ];

        foreach ($categories as $catName => $skills) {
            $category = \App\Models\SkillCategory::create(['name' => $catName]);
            foreach ($skills as $skill) {
                $category->skills()->create($skill);
            }
        }

        // Experiences
        \App\Models\Experience::truncate();
        \App\Models\Experience::create([
            'role' => 'CTO',
            'company' => 'AllTake Global PVT.LTD',
            'start_date' => '2024-12-01',
            'is_current' => true,
            'description' => 'Leading technology teams and overseeing software product development.',
        ]);
        \App\Models\Experience::create([
            'role' => 'Associate Director',
            'company' => 'Zymr, Inc.',
            'start_date' => '2011-09-01',
            'end_date' => '2024-12-01',
            'is_current' => false,
            'description' => 'Led technology teams and fostered innovation culture.',
        ]);

        // Projects
        \App\Models\Project::truncate();
        \App\Models\Project::create([
            'title' => 'SOPACT - Social Impact Platform',
            'slug' => 'sopact-social-impact',
            'description' => 'Full-fledged web application built from ground up using PHP, MySQL, and React.js.',
            'tech_stack' => json_encode(['PHP', 'React', 'MySQL', 'AWS']),
            'order' => 1,
        ]);
        
        // Education
        \App\Models\Education::truncate();
        \App\Models\Education::create([
            'degree' => 'Bachelor of Engineering in IT',
            'institution' => 'Shantilal Shah Engineering College',
            'start_date' => '2005-06-01',
            'end_date' => '2009-05-01',
            'description' => 'Comprehensive study in Information Technology.',
        ]);

        // Testimonials
        \App\Models\Testimonial::truncate();
        \App\Models\Testimonial::create([
            'name' => 'Unmesh Sheth',
            'role' => 'CEO',
            'company' => 'SoPact',
            'content' => 'Rohit demonstrated outstanding leadership and project management abilities.',
            'rating' => 5,
        ]);
    }
}
