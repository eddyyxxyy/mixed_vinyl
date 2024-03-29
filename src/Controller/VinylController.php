<?php

/**
 * This file contains the VinylController class responsible for
 * handling vinyl related routes within the application.
 *
 * The controller defines methods for rendering the homepage and
 * browsing vinyl by genre.
 * 
 * php version 8.3.3
 *
 * @category Controller
 * @package  Mixed_Vinyl
 * @author   Edson Pimenta <dev.eddyyxxyy@gmail.com>
 * @license  MIT https://mit-license.org/
 * @link     http://github.com/eddyyxxyy/mixed_vinyl
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

/**
 * This class is responsible for handling vinyl related routes.
 *
 * @category Controller.
 * @package  Mixed_Vinyl
 * @author   Edson Pimenta <dev.eddyyxxyy@gmail.com>
 * @license  MIT https://mit-license.org/
 * @link     http://github.com/eddyyxxyy/mixed_vinyl
 */
class VinylController extends AbstractController
{
    /**
     * Renders the homepage
     *
     * @return Response
     */
    #[Route("/", "home")]
    public function homepage(): Response
    {
        $tracks = [
            ["song" => "Gangsta's Paradise", "artist" => "Coolio"],
            ["song" => "Waterfalls", "artist" => "TLC"],
            ["song" => "Creep", "artist" => "Radiohead"],
            ["song" => "Kiss from a Rose", "artist" => "Seal"],
            ["song" => "On Bended Knee", "artist" => "Boyz II Men"],
            ["song" => "Fantasy", "artist" => "Mariah Carey"],
        ];

        return $this->render(
            "vinyl/homepage.html.twig",
            [
                'title' => 'PB and Jams',
                'tracks' => $tracks,
            ]
        );
    }

    /**
     * Gets URI slug and browse genre related pages
     * 
     * @param string|null $slug Genre title
     * 
     * @return Response
     */
    #[Route("/browse/{slug}", "browse")]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        }

        return new Response($title);
    }
}
