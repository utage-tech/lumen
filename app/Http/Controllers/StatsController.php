<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\ThirdParty\UtageStats\PlayerStats;

class StatsController extends Controller{
    public function index(Request $request, $season, $steamID64 ){

      if( is_numeric( $season ) ){
        $playerStats = PlayerStats::create( (int)$season, (string)$steamID64 );
        if( $playerStats !== false ){
          return response()->json(
            [
              'status' => 0,
              'steamID64' => $playerStats->getSteamID(),
              'season' => $playerStats->getSeason(),
              'teamName' => $playerStats->getTeamName(),
              'name' => $playerStats->getName(),
              'kills' => $playerStats->getKills(),
              'deaths' => $playerStats->getDeaths(),
              'assists' => $playerStats->getAssists(),
              'assists_flashbang' => $playerStats->getFlashBangAssists(),
              'v1' => $playerStats->getWon1VS1Rounds(),
              'v2' => $playerStats->getWon1VS2Rounds(),
              'v3' => $playerStats->getWon1VS3Rounds(),
              'v4' => $playerStats->getWon1VS4Rounds(),
              'v5' => $playerStats->getWon1VS5Rounds(),
              'k1' => $playerStats->getWonVS1Rounds(),
              'k2' => $playerStats->getWonVS2Rounds(),
              'k3' => $playerStats->getWonVS3Rounds(),
              'k4' => $playerStats->getWonVS4Rounds(),
              'k5' => $playerStats->getWonVS5Rounds(),
              'match' => $playerStats->getMatches(),
              'score' => $playerStats->getScores(),
              'adr' => $playerStats->getADR(),
              'hsp' => $playerStats->getHSP(),
              'fpr' => $playerStats->getFPR(),
              'rating' => $playerStats->getRating(),
            ]
          );
        }
      }
      return response()->json(
        [
          'status' => 1,
          'message' => 'Not find the right response.'
        ]
      );
    }
}
