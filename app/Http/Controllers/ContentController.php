<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getContentView($selectedContentName)
    {
        return view('components.' . $selectedContentName, ['text' => $this->getContentText($selectedContentName)]);
    }

    /**
     * Separating text by parts to array
     * @param string $text
     * @param int $countWords - count of words in one parts
     * @return string[]
     */
    private function separateTextToArray(String $text, Int $countWords)
    {
        $words = preg_split('/\s+/', trim($text));
        $chunks = [];
        for ($i = 0; $i < count($words); $i += $countWords) {
            $chunk = array_slice($words, $i, $countWords);
            $chunks[] = implode(' ', $chunk);
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

        ];

        return $this->separateTextToArray($content[$selectedContentName], 6);
    }
}
