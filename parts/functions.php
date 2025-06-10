<?php
namespace Projekt_Szarka;

class DataLoader
{
    private string $filepath;
    private array $data = [];

    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
        $this->loadData();
    }

    private function loadData(): void
    {
        if (!file_exists($this->filepath)) {
            throw new \Exception("JSON {$this->filepath} not found");
        }

        $json = file_get_contents($this->filepath);
        $decoded = json_decode($json, true);

        $this->data = $decoded;
    }

    public function getSection(string $key): array
    {
        return $this->data[$key] ?? [];
    }
}

