<?php


namespace App\Controller;

use App\Service\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * @var UserManager $userManager
     */
    protected $userManager;

    /**
     * UserController constructor.
     * @param UserManager $userManager
     */
    public function __construct(
        UserManager $userManager
    ) {
        $this->userManager = $userManager;
    }

    /**
     * @Route(path="/users", name="users")
     */
    public function users()
    {
        if (is_null($this->getUser())) {
            return $this->redirect('login');
        }

        $users = $this->userManager->getUsers();

        return $this->render('users.html.twig', [
            'user' => $this->getUser(),
            'users' => $users,
            'currentPage' => 'users'
        ]);
    }
}
