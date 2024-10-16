<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '9 Tips for Effective Meetings',
            'content' => '<p>Meetings can be fun and highly effective, but an inefficient one can be a drain on your time, especially if you’re busy.&nbsp;</p><p>This doesn\'t just apply to those working in the <a href="https://digitalmarketinginstitute.com/blog/what-is-digital-marketing">digital marketing</a> sector, it applies to any industry.&nbsp;</p><p>Whether it’s a quick team meeting or one that requires brainstorming or strategic discussion, there are some simple but effective rules you can follow to make it successful.&nbsp;</p><p>&nbsp;</p><h3><strong>1. Set a clear agenda</strong></h3><p>When you are time-starved and have lots to do (like most marketers) a meeting without a purpose is a drag. Send an agenda before the meeting so people know what to expect and if they need to prepare any information or do some research.&nbsp;</p><p>You can also have the agenda displayed on a screen or even printed (for a face-to-face meeting) to help things move along smoothly. This is particularly important for online meetings where people work remotely and might be out of touch with a campaign or project.&nbsp;&nbsp;</p><p>An agenda helps to steer the meeting back on track if it’s going off on a tangent or breaking into smaller discussions. For example, you can say&nbsp;</p><blockquote><p><i>“That’s a great idea, but not one for right now. Let’s add it to the next X meeting for discussion.”</i></p></blockquote><h3><strong>2. Know your desired outcomes</strong></h3><p>From the outset, you should know what you want to get from the meeting.&nbsp;</p><p>Are you looking for ideas? Do you need to get a budget approved? Is it to provide support for team members on a challenging project?&nbsp;</p><p>Be clear on what you want and work through the meeting to make sure you get outcomes from it. The last few minutes of the meeting should be used to go through the next steps and assign people to undertake them. It helps you lay down a clear action plan everyone is aware of.&nbsp;</p><p>You should also ensure that everyone invited has a part to play or is involved in the team or project. Don’t waste anyone’s time if they could be doing other things.</p><figure class="image"><img src="http://127.0.0.1:8000/media/Blog_Infographic_How_to_Give_Effective_Feedback___1080x1350_1729101874.jpeg"><figcaption>&nbsp;Effective Tips</figcaption></figure>',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'published_at' => '2024-10-16 18:05:45',
                'published_by' => 1,
                'created_at' => '2024-10-16 18:05:21',
                'updated_at' => '2024-10-16 18:05:45',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'The Ultimate Email Marketing Guide',
                'content' => '<figure class="image"><img src="http://127.0.0.1:8000/media/email-vs-social-media-first-check-of-day_1729102162.png"><figcaption>Email Marketing</figcaption></figure><h2><strong>What is email marketing?</strong></h2><p>The definition of email marketing is a form of digital marketing that uses email to promote products or services to potential or existing customers.&nbsp;</p><p>The DMA’s Consumer Email Tracker 2023 report found that subscriber value is increasing. In 2021, just 15% of consumers said their emails were useful, a number which has doubled to 32% in 2023. Dwell time is also high for email at 11 seconds compared to just 1.7 seconds for digital ad impressions, and 7.5 seconds for a TV ad.&nbsp;&nbsp;&nbsp;&nbsp;</p><p>Email marketing is an essential channel leveraged by B2C and <a href="https://digitalmarketinginstitute.com/blog/how-b2b-email-marketing-can-turn-leads-into-sales">B2B companies</a> to build brand awareness, grow customer loyalty, and drive conversions.&nbsp;</p><h2><strong>Why is email marketing important?</strong></h2><p>Email marketing is one of the most profitable direct marketing channels, with Statista projecting global revenue from email to reach $17.9 billion by 2027.&nbsp;</p><p>The reason for this growth is that email marketing offers a direct and personalized way for brands to engage with customers. This helps build meaningful relationships, and drives conversions.&nbsp;</p><p>Email also allows for targeted messaging so businesses can send segment audiences to send relevant messages. It’s also a <a href="https://digitalmarketinginstitute.com/blog/10-cost-effective-email-marketing-examples">cost-effective</a> and measurable channel that can nurture leads over time to boost brand loyalty.&nbsp;</p><p><i>"Email is one of those channels where there are so many nuances,” </i>said email marketing consultant, Karen Talavera in a <a href="https://digitalmarketinginstitute.com/resources/podcasts/podcast-010-the-art-and-science-of-email-marketing-karen-talavera">DMI podcast</a>. <i>“There\'s an art and a science to it, and people are often so busy in the trenches that they don\'t have time to come up for air, figure out what they should be doing, how they can do it better, and really put some true strategy to this channel."</i></p><p>Let’s look at three of the most important features of email marketing for your business.</p>',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'published_at' => '2024-10-16 18:11:55',
                'published_by' => 1,
                'created_at' => '2024-10-16 18:11:09',
                'updated_at' => '2024-10-16 18:14:22',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '5 Ways to Be a Successful Hybrid Worker',
                'content' => '<h2><strong>What is hybrid working?</strong></h2><p>Hybrid working blends remote work with in-office time, allowing employees to split their workdays between home and the office.&nbsp;</p><p>It combines the freedom of remote work with the collaboration and structure of an in-person office environment.&nbsp;</p><p>However, many companies are concerned about how hybrid working affects employee experience, engagement, and culture. This has led many - including big brands like <a href="https://digitalmarketinginstitute.com/resources/case-studies/the-enduring-innovation-and-magic-of-disney">Disney</a> and <a href="https://fortune.com/2023/10/20/nike-changes-return-to-office-policy-four-days/">Nike</a> - to bring in return-to-office policies that require workers to be in the office for up to five days.</p><p>A recent survey from Resume Builder showed that 9 in 10 companies with office space will have returned to office by 2024 while 72% say return-to-office has improved revenue.&nbsp;</p><p><i>“We, as recruiters, have seen clients and behaviors are changing rapidly. It used to be that people would work mostly remotely: now 90% of our vacancies are three days in the office for people that work in marketing,”</i> said Terry Payne, Global Managing Director at ⁠Aspire⁠ Recruitment on a <a href="https://digitalmarketinginstitute.com/resources/podcasts/podcast-099-trends-in-digital-marketing-jobs-aspire">DMI podcast</a>.&nbsp;</p><figure class="image"><img src="http://127.0.0.1:8000/media/Screenshot_2024-09-26_120852_1729102631.jpeg"><figcaption>Advantages</figcaption></figure>',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'published_at' => '2024-10-16 18:17:40',
                'published_by' => 1,
                'created_at' => '2024-10-16 18:17:24',
                'updated_at' => '2024-10-16 18:17:40',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'How to Create an AI Digital Marketing Strategy',
            'content' => '<h2><strong>What is an AI digital marketing strategy?</strong></h2><p>While many companies are embracing AI, it’s about a lot more than simply using AI tools to manage repetitive tasks or generate marketing content.&nbsp;</p><p>To get the most from the technology, organizations require a strategy that can help them leverage AI to enhance marketing efforts, optimize campaigns, and improve customer engagement.&nbsp;</p><p><i>“AI and machine learning offer brands and marketers an opportunity to improve efficiency and improve effectiveness of their marketing. Those efficiency and effectiveness gains can be either applied to their internal function, things that their staff or team does that customers never see, or to external things that are customer facing,” </i>said Jim Lecinski, Clinical Associate Professor of Marketing at Kellogg School of Marketing, Northwestern University in a <a href="https://digitalmarketinginstitute.com/resources/podcasts/podcast-083-get-started-with-ai-in-marketing-jim-lecinski">DMI podcast</a>.&nbsp;</p><blockquote><p><i>" 37% of businesses don’t have an AI strategy while 54% of marketers believe the level of AI skills on their team is low "</i>- DMI Member Survey 2024</p></blockquote><h2><strong>What AI digital marketing tools should you use?</strong></h2><p>One of the best things about AI is that it can be used for a range of marketing tasks.&nbsp;</p><p>According to our recent corporate report, the top five benefits of integrating AI into marketing are:&nbsp;</p><ul><li>Automation of routine tasks (68%)</li><li>Improved customer experience (46%)</li><li>Improved targeting and segmentation (45%)</li><li>Enhanced personalization (44%)&nbsp;</li><li>Predictive analysis (39%)</li></ul><figure class="image"><img src="http://127.0.0.1:8000/media/Blog_Infographic_12_ways_digital_marketers_can_use_ChatGPT_1729102751.jpg"><figcaption>12 Ways</figcaption></figure><p>&nbsp;</p>',
                'status' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'published_by' => NULL,
                'created_at' => '2024-10-16 18:19:34',
                'updated_at' => '2024-10-16 18:19:34',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'How Will X Change: 3 Possible Scenarios',
                'content' => '<h2><strong>How brands have reacted to changes at X</strong></h2><p>Annual revenues at X are driven almost exclusively by advertising services. However, they have fallen sharply since Musk took over.</p><figure class="image"><img src="http://127.0.0.1:8000/media/Advertising_Revenue_at_X_1729102843.jpg"><figcaption>&nbsp;</figcaption></figure><p>Musk is aware of the importance of advertising to his company, but he appears to be unaware of how to communicate with advertisers.&nbsp;</p><p>He laid off the platform’s content moderation teams, and he posts right-wing conspiracy theories and other politically inflammatory content.&nbsp;</p><p>These actions create an <a href="https://digitalmarketinginstitute.com/blog/advertising-problems-for-x">uncertain climate for advertisers</a>, and they have other options for reaching their audience, including <a href="https://digitalmarketinginstitute.com/blog/the-rapid-rise-of-tiktok">TikTok</a> and Snapchat. As a result, huge brands including Unilever and CVS Health have stopped spending money to promote products on X. In late 2023, Musk responded to what he saw as “blackmail” by advertisers with a foul-mouthed tirade that included the immortal phrase, “I don’t want them to advertise.”</p><p>Except, Musk does want them to advertise. In 2024, X launched a lawsuit against a group of brands that it claims has orchestrated an illegal boycott of the platform.&nbsp;</p><p>Nonetheless, it is hard to avoid the conclusion that Musk is missing the point. Individual brands have taken the decision to avoid the platform based on their own business goals and sound investment rationale. This has led to damaging headlines for X.</p>',
                'status' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'published_by' => NULL,
                'created_at' => '2024-10-16 18:21:07',
                'updated_at' => '2024-10-16 18:21:07',
            ),
        ));
        
        
    }
}