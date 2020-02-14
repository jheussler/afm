<?php


namespace App\Controller;

use App\Service\GroupManager;
use App\Service\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GroupController
 * @package App\Controller
 */
class GroupController extends AbstractController
{
    /**
     * @var GroupManager $groupManager
     */
    protected $groupManager;

    /**
     * GroupController constructor.
     * @param GroupManager $groupManager
     */
    public function __construct(
        GroupManager $groupManager
    ) {
        $this->groupManager = $groupManager;
    }

    /**
     * @Route(path="/groups", name="groups")
     */
    public function users()
    {
        if (is_null($this->getUser())) {
            return $this->redirect('login');
        }

        $groups = $this->groupManager->getGroups();

        return $this->render('groups.html.twig', [
            'user' => $this->getUser(),
            'groups' => $groups,
            'currentPage' => 'groups'
        ]);
    }
}
