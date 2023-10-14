<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{

    public function index(){
        $reviews = Review::all();
        $user = Auth::user();
        $currentMusician = $user->musician;
        $messages = Message::all();
        $userId = Auth::user();
        $messages = Message::all();
        $musicianMessages = Message::where('musician_id', $userId->id)->get();

        $messageGroup = $musicianMessages
        ->sortBy(function($message){
        return $message->created_at; // Utilizziamo format per formattare la data correttamente
    })
        ->groupBy(function ($message) {
        return $message->created_at->format('Y-m'); // Utilizziamo format per formattare la data correttamente

        });

        $messageCounts = $messageGroup->map(function ($messageGroup) {
            return $messageGroup->count();
        });

    
        
        
        

            $userId = Auth::user();
            $review = Review::all();
            $musicianReview = Review::where('musician_id', $userId->id)->get();
            
            $reviewGroup = $musicianReview
            ->sortBy(function($review){
                return $review->create_at;
            })
            ->groupBy(function($review){
                return $review->created_at->format('Y-m');
            });
            
            $reviewCounts = $reviewGroup->map(function($reviewGroup){
                return $reviewGroup->count();
            });



            $votesData = [];

            // Raggruppa le recensioni per mese/anno
            $groupedReviews = $musicianReview->groupBy(function ($review) {
                return $review->created_at->format('Y-m');
            });
            
            // Itera attraverso i gruppi di recensioni
            foreach ($groupedReviews as $monthYear => $reviews) {
                $voteCounts = [
                    '1-2' => 0,
                    '3-4' => 0,
                    '5'   => 0,
                ];
            
                // Calcola i conteggi delle fasce di voto per questo mese/anno
                foreach ($reviews as $review) {
                    $vote = $review->vote;
            
                    if ($vote >= 1 && $vote <= 2) {
                        $voteCounts['1-2']++;
                    } elseif ($vote >= 3 && $vote <= 4) {
                        $voteCounts['3-4']++;
                    } elseif ($vote == 5) {
                        $voteCounts['5']++;
                    }
                }
            
                // Aggiungi i conteggi dei voti per questo mese/anno ai dati
                $votesData[$monthYear] = $voteCounts;
            }
            
            return view('admin.statistics.index', compact('messageCounts', 'reviewCounts', 'votesData','reviews', 'user', 'currentMusician', 'messages'));
            
        
    }


}

