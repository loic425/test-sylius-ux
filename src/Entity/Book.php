<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Metadata\Create;
use Sylius\Component\Resource\Metadata\Delete;
use Sylius\Component\Resource\Metadata\Index;
use Sylius\Component\Resource\Metadata\Resource;
use Sylius\Component\Resource\Metadata\Update;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[Resource(alias: 'app.book')]
#[Create(routePrefix: 'semantic_ui', template: '@SyliusUxSemanticUi/crud/create.html.twig', section: 'semantic_ui')]
#[Update(routePrefix: 'semantic_ui', template: '@SyliusUxSemanticUi/crud/update.html.twig', section: 'semantic_ui')]
#[Index(routePrefix: 'semantic_ui', template: '@SyliusUxSemanticUi/crud/index.html.twig', section: 'semantic_ui', grid: 'app_book')]
#[Delete(routePrefix: 'semantic_ui', section: 'semantic_ui')]
class Book implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[NotBlank]
    private ?String $title = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[NotBlank]
    private ?string $authorName = null;

    public function __construct(?int $id = null)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthorName(): ?string
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName): self
    {
        $this->authorName = $authorName;

        return $this;
    }
}
