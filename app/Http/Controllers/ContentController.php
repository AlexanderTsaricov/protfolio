<?php

namespace App\Http\Controllers;

use App\Models\CodeSnippet;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getContentView($selectedContentName)
    {
        return view('components.education', ['text' => $this->getContentText($selectedContentName)]);
    }

    /**
     * Separating text by parts to array
     * @param string $text
     * @param int $countWords - count of words in one parts
     * @return string[]
     */
    private function separateTextToArray(String $text, int $countLetters)
    {
        $words = preg_split('/\s+/', trim($text));
        $chunks = [];
        $index = 0;
        $chunks[$index] = '';
        foreach ($words as $word) {
            $chunks[$index] .= $word . ' ';
            if (strlen($chunks[$index]) > $countLetters) {
                $index += 1;
                $chunks[$index] = '';
            }
        }

        return $chunks;
    }

    private function getContentText($selectedContentName = null)
    {
        if ($selectedContentName == null) {
            return null;
        }
        $content = [
            'education' => "Hello! My name is Alexander, and programming is my true passion and path for growth. 
                I have studied Python, C#, Java, JavaScript, PHP, HTML, CSS, and related libraries, and I recently 
                completed my training as a programmer. Although I don’t yet have commercial development experience, 
                I’m actively working on personal projects—such as a mobile expense-tracking app and a hookah-flavor randomizer. 
                These projects help me solidify my skills and learn to solve real-world problems independently. Before transitioning into IT, 
                I spent nine years working at a factory, where I handled claims and contract documentation, 
                traveled on business trips (including abroad), and performed equipment repairs.
                That experience taught me how to build communication quickly, work effectively in a team, 
                and adapt to new conditions—qualities I already apply when developing my own applications and learning new technologies.
                In my free time, I enjoy computer games and occasionally create small “mods” or scripts for them to broaden my programming horizons. 
                I’m also passionate about tourism: hiking and traveling inspire me and help me maintain balance between work and personal life.
                Now I’m looking for opportunities to apply my knowledge and practical experience from personal projects in a real IT team. 
                I’m particularly interested in Full-Stack PHP-JS, but I’m open to any engaging tasks and technologies. 
                I would welcome the chance to collaborate, learn from experienced colleagues, grow as a developer, 
                and contribute to a project. If you have any offers or questions, I’d be happy to discuss them!",
            'school' => "I studied at MOE Secondary School No. 7 in the city of Sukhoy Log, Sverdlovsk Region. 
                It was here that I first felt an interest in programming and information technology. 
                Although I did not study programming seriously during my school years, it was at that time that 
                I realized this field was close to me and truly interesting.",
            'college' => "I enrolled at the Ural Radio Engineering College (URTC), 
                where I studied Radio Equipment Engineering. Initially, I considered switching to a programming-related field, 
                but thanks to a friendly and inspiring group of classmates — and genuine interest in the technical subjects at 
                first — I decided to stay and complete the program. My education at URTC gave me a solid technical foundation 
                and a disciplined approach to learning. It also strengthened my confidence in my ability to create, understand systems, 
                and solve problems — qualities that I later directed toward the field of programming",
            'university' => "After finishing school, I enrolled at the Ural State Forest Engineering University (UGLTU). 
                However, after completing the first year, I realized that I had chosen the wrong path. The studies didn’t bring 
                me any satisfaction, and it became increasingly clear that I was not in the right place. Instead of continuing to 
                invest time in a field that didn’t resonate with me, I made the decision to withdraw. It wasn’t an easy choice, 
                but it was an important step toward making a conscious decision about my future career. 
                After that, I enrolled at the Ural Radio Technical College (URTK), where the education turned out to be much 
                closer to my interests and became the starting point of my journey into programming.",
            'courses' => "My journey into programming began in 2020 when I enrolled in programming courses. Unfortunately, 
                I had to pause my studies due to work commitments. However, my interest in development never faded. In 2024, 
                I resumed learning with renewed motivation and successfully completed the courses in 2025. 
                The results of my learning are right in front of you — I built this website myself. 
                You can also explore more of my work in the [“Projects”] section.",
            'interests' => "I enjoy traveling and discovering new places and cultures. I've visited countries such as Serbia, 
                Montenegro, India, Kazakhstan, Venezuela, and Egypt. I also travel within Russia from time to time — I've been to Moscow, 
                Saint Petersburg, Perm, and other cities. Occasionally, I go hiking, although not very often. Another one of my passions 
                is computer games, especially sandbox-style games. I’m particularly interested in the creative freedom they offer and 
                the opportunity to experiment. In some of these games, I apply my programming knowledge to write in-game scripts. For example, 
                in Space Engineers I write scripts in C#, and in Stationeers I use the built-in scripting language, which is similar to Lua. 
                This hobby is not only fun but also helps me improve my logic and coding skills in unconventional scenarios.",
            'games' => "As I mentioned in the “Interests” section, I often apply my programming skills in video games. For me, it's not just 
                entertainment — it’s also a way to practice logic, work with APIs, and structure code effectively. For example, Space Engineers 
                uses full-fledged C#. The game provides a built-in library that allows creating in-game scripts: combining blocks, filtering them 
                by name and type, automatically sorting inventory. You can even program a bot to patrol and defend your base, or write code to make 
                solar panels track the sun for maximum energy efficiency during the day. In Stationeers, the programming language is simpler, 
                but it plays a crucial role in automation and efficient space management. This is a game where gases mix, heat up, and cool down 
                according to the laws of physics. The goal is to build and maintain a working station on the Moon, Mars, or another planet. 
                Programming allows you to manage life support, resource processing, ventilation, and many other systems — automating routine tasks 
                and deepening interaction with the game world. These kinds of projects help me not only sharpen my technical skills, 
                but also teach me to approach problems with an engineering and system-oriented mindset.",
            'frontend' => "I actively use modern web technologies — HTML5, CSS3 (including SCSS), JavaScript, and popular UI frameworks. 
                In the TabacooApp project, I developed a cross-platform mobile interface using Vue.js and Vite, with responsive layout and integration 
                via Capacitor for deployment on Android and iOS. The app interacts with device features and includes custom UI components. 
                I have also worked with React, creating interfaces based on component architecture, managing state, and applying SCSS styling. 
                This gave me a clear understanding of React's ecosystem and modular development principles. In the Brand_site project, I applied clean HTML, 
                CSS, and JavaScript, along with SCSS for flexible styling. I focused on responsive design, cross-browser compatibility, and BEM methodology 
                for code organization. My portfolio website is built using Laravel with Blade templates, allowing me to generate server-side interfaces 
                and style them using CSS and SCSS. This project reflects my experience in combining server and client logic.",
            'backend' => "My back-end experience includes PHP (primarily with Laravel), Node.js, Express.js, SQL, and template engines like Blade 
                and Handlebars. In Laravel projects, I’ve used the MVC architecture, Eloquent ORM, and worked with relational databases through migrations, 
                seeders, and query building. The node.js_attestation project is based on Node.js, using Handlebars templates, server-side logic 
                for data validation, form handling, and HTML generation. Data is managed in JSON structures, with styling handled via SCSS. 
                I’ve implemented REST routing, CRUD operations, middleware, and controller logic. I use Composer and NPM for dependency management. 
                I also developed some projects using raw PHP, creating server logic and basic database interactions. In Laravel, 
                I’ve worked with built-in tools for authentication, validation, error handling, and testing. These experiences helped me gain a structured 
                and practical approach to building full-featured back-end applications.",
            'javaScript' => "Used in both front-end (Vue.js, React) and back-end (Node.js, Express). I use it for DOM manipulation, 
                logic, working with APIs, and dynamic rendering.",
            'php' => "I write server logic using Laravel. I work with Blade templates, Eloquent ORM, and build REST APIs and route controllers.",
            'java' => "I’ve explored Java through developing console and visual applications, gaining a general understanding 
                of object-oriented design and application structure.",
        ];

        return $this->separateTextToArray($content[$selectedContentName], 40);
    }

    public function codeSnippets()
    {
        $codes = CodeSnippet::all();
        return response()->json($codes, 200);
    }

    public function updateStars($id)
    {
        $snippet = CodeSnippet::findOrFail($id);
        $snippet->increment('stars');
        return response()->json(['stars' => $snippet->stars], 200);
    }
}
