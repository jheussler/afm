<?php


namespace App\Controller;

use App\Service\FileManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FileController
 * @package Adimeo\FileManager\Controller
 */
class FileController extends AbstractController
{
    /**
     * @var FileManager $fileManager
     */
    protected $fileManager;

    /**
     * FileController constructor.
     * @param FileManager $fileManager
     */
    public function __construct(
        FileManager $fileManager
    ) {
        $this->fileManager = $fileManager;
    }

    /**
     * @Route(path="/", name="homepage")
     */
    public function files()
    {
        if (is_null($this->getUser())) {
            return $this->redirect('login');
        }

        $directories = $this->fileManager->getUserDirectories($this->getUser());
        $files       = $this->fileManager->getUserFiles($this->getUser());

        return $this->render('files.html.twig', [
            'user' => $this->getUser(),
            'directories' => $directories,
            'files'       => $files,
            'currentPage' => 'files'
        ]);
    }
}
