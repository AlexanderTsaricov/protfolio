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
                You can also explore more of my work in the [“Projects”] section."
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
