<?php

namespace App\Services;

use App\Enums\MatchStatus;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Exception;

class MatchTrackerService
{
  protected Client $client;
  protected string $apiKey;
  protected string $baseUrl;

  public function __construct()
  {
    $this->client = new Client();
    $this->apiKey = config('services.api_football.key');
    $this->baseUrl = config('services.api_football.url');
  }

  private function makeRequest(string $endpoint): array
  {
    try {
      $response = $this->client->get($this->baseUrl . $endpoint, [
        'headers' => ['X-Auth-Token' => $this->apiKey],
      ]);

      return [
        'success' => true,
        'data' => json_decode($response->getBody(), true),
      ];
    } catch (RequestException $e) {
      return [
        'success' => false,
        'message' => 'Erro ao conectar com a API de futebol.',
        'error' => $e->getMessage(),
      ];
    } catch (Exception $e) {
      return [
        'success' => false,
        'message' => 'Ocorreu um erro inesperado.',
        'error' => $e->getMessage(),
      ];
    }
  }

  private function formatMatches(array $matches): array
  {
    if (!isset($matches['data']['matches'])) {
      return [
        'success' => false,
        'message' => 'Não foi possível recuperar os jogos.',
        'data' => [],
      ];
    }

    foreach ($matches['data']['matches'] as &$match) {
      $status = MatchStatus::tryFrom($match['status']);
      $match['statusFormatted'] = $status ? [
        'label' => $status->label(),
        'class' => $status->cssClass(),
      ] : [
        'label' => 'Aguardando...',
        'class' => 'bg-gray-200 text-gray-800',
      ];
    }

    return [
      'success' => true,
      'data' => $matches['data'],
    ];
  }

  public function getAllCompetitions(): array
  {
    $competitions = $this->makeRequest('competitions/');

    if (!$competitions['success']) {
      session()->flash('status', 'Erro: ' . $competitions['message']);
      return [
        'success' => false,
        'message' => $competitions['message'],
      ];
    }

    return [
      'success' => true,
      'data' => $competitions['data'],
    ];
  }


  public function getAllTimes($competitionCode): array
  {
    return $this->makeRequest("competitions/{$competitionCode}/teams");
  }

  public function getAllMatches($competitionCode): array
  {
    $matches = $this->makeRequest("competitions/{$competitionCode}/matches");
    return $this->formatMatches($matches);
  }

  public function findOneTeam(int $teamId): array
  {
    return $this->makeRequest("teams/{$teamId}");
  }

  public function getLastMatches(int $teamId): array
  {
    $lastMatches = $this->makeRequest("teams/{$teamId}/matches?status=FINISHED");
    return $this->formatMatches($lastMatches);
  }

  public function getUpcomingMatches(int $teamId): array
  {
    $nextMatches = $this->makeRequest("teams/{$teamId}/matches?status=SCHEDULED");
    return $this->formatMatches($nextMatches);
  }
}
