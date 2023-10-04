namespace App\EntityListener;
use App\Entity\Conference;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;
class ConferenceEntityListener
{
    public function __construct(private SluggerInterface $slugger) { }
    public function __invoke(Conference $conference, LifecycleEventArgs $event)
    {
        $conference->computeSlug($this->slugger);
    }
}