<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScheduleRepository")
 */
class Schedule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $theater;

    /**
     * @ORM\Column(type="datetime")
     */
    private $session;

    /**
     * @ORM\Column(type="integer")
     */
    private $movieId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheater(): ?string
    {
        return $this->theater;
    }

    public function setTheater(string $theater): self
    {
        $this->theater = $theater;

        return $this;
    }

    public function getSession(): ?\DateTimeInterface
    {
        return $this->session;
    }

    public function setSession(\DateTimeInterface $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getMovieId(): ?int
    {
        return $this->movieId;
    }

    public function setMovieId(int $movieId): self
    {
        $this->movieId = $movieId;

        return $this;
    }
}
