<?php

namespace Database\Seeders;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'image_large' => 'https://onextrapixel.com/wp-content/uploads/2022/11/fonts-for-groovy-designs.png',
                'image_middle' => 'https://onextrapixel.com/wp-content/uploads/2022/11/fonts-for-groovy-designs-545x331.png',
                'title' => '26 Best 60s Fonts for Groovy Designs for 2023',
                'desc' => 'Hoping to capture the spirit of the swinging sixties in your designs? Then check out these groovy 60s fonts! The sixties was the decade of free love, miniskirts, peace',
                'text' => 'Hoping to capture the spirit of the swinging sixties in your designs? Then check out these groovy 60s fonts!

The sixties was the decade of free love, miniskirts, peace, and psychedelic art. It was a time of unprecedented change, cultural upheaval, and social revolution.

This radical atmosphere gave way to equally radical stylistic trends and brought about exotic fashion choices, bold colors, and extravagant designs that kick back against the norm.

The 60s-inspired fonts on this list all encapsulate that same rebellious style. They’re fun, groovy, and psychedelic.

Use them in your next vintage 1960s design project—or any other project in which you’re trying to evoke the same sense of freedom, liberation, and non-conformity that defined the time period.',
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'user_id' => 1,
            ],
            [
                'image_large' => 'https://onextrapixel.com/wp-content/uploads/2022/11/instagram-story-highlight-icons-.png',
                'image_middle' => 'https://onextrapixel.com/wp-content/uploads/2022/11/instagram-story-highlight-icons--545x331.png',
                'title' => '24 Best Instagram Story Highlight Icons for 2023',
                'desc' => 'Want to improve the look of your Instagram profile and make it more professional? Instagram Story Highlight Icons can help you do this.  Instagram Story Highlight Icons are',
                'text' => 'Instagram Story Highlight icons are images that can be used as cover photos for your Highlight reels on Instagram. Highlight reels are used to document past Stories that you want to share with your followers for more than 24 hours. As a default, the first Story in your Highlight will appear as the cover image, however, you can change this to make it more relevant and aesthetically pleasing.

Highlights appear below your bio, and by using Highlight icons, you can categorize your Stories to make it easier for your followers to find the old Stories that they’re looking for. You can use Highlights to keep a record of old memories from your Story archives or provide important information like product and business details. ',
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'user_id' => 1,
            ],
            [
                'image_large' => 'https://onextrapixel.com/wp-content/uploads/2021/10/resume-templates-.png',
                'image_middle' => 'https://onextrapixel.com/wp-content/uploads/2021/10/resume-templates--545x331.png',
                'title' => '21 Best Resume Templates to Impress Employers (2022)',
                'desc' => 'Thinking about applying for a new job? Looking for a way to get your resume noticed by potential employers? What you need is a resume template.  Resume templates are',
                'text' => 'Instagram Story Highlight icons are images that can be used as cover photos for your Highlight reels on Instagram. Highlight reels are used to document past Stories that you want to share with your followers for more than 24 hours. As a default, the first Story in your Highlight will appear as the cover image, however, you can change this to make it more relevant and aesthetically pleasing.

Highlights appear below your bio, and by using Highlight icons, you can categorize your Stories to make it easier for your followers to find the old Stories that they’re looking for. You can use Highlights to keep a record of old memories from your Story archives or provide important information like product and business details. ',
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'user_id' => 1,
            ],

            [
                'image_large' => 'https://onextrapixel.com/wp-content/uploads/2018/11/lms-plugins-guide-oxp.jpg',
                'image_middle' => 'https://onextrapixel.com/wp-content/uploads/2018/11/lms-plugins-guide-oxp-545x331.jpg',
                'title' => 'How To Create & Sell Online Courses with WordPress For Free',
                'desc' => 'One of the most profitable ways of turning your blog into a business is creating and selling an online course. In this guide, we’re going to show you how',
                'text' => 'Instagram Story Highlight icons are images that can be used as cover photos for your Highlight reels on Instagram. Highlight reels are used to document past Stories that you want to share with your followers for more than 24 hours. As a default, the first Story in your Highlight will appear as the cover image, however, you can change this to make it more relevant and aesthetically pleasing.

Highlights appear below your bio, and by using Highlight icons, you can categorize your Stories to make it easier for your followers to find the old Stories that they’re looking for. You can use Highlights to keep a record of old memories from your Story archives or provide important information like product and business details. ',
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'user_id' => 2,
            ],
        ];

        Blog::insert($data);
    }
}
