<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAllReviews()
    {
        return view('main',
        [
            'reviews' => Review::with("user", "artist", "album")->simplePaginate(6)

        ]);
    }

    public function addReviewForm()
    {
        return view('new');
    }

    /**
     * @param ReviewRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeData(ReviewRequest $request)
    {
       $review = new Review;
       $review->fill($request->validated());
       $review->save();

       return redirect()->route('addReview');
    }

    public function updateReview(ReviewRequest $request, Review $review)
    {
        if($review->user_id === Auth::user()->id || $review->user->is_admin){

            $review->where('id', $review->id)->fill($request->validated());

            return redirect()->route('singleReview', $review->id);
        }else{
            return redirect()->route('singleReview', $review->id);
        }

    }

    public function deleteReview(Request $request, Review $review)
    {
        if($review->user_id === Auth::user()->id || Auth::user()->is_admin){

            $review->where('id', $review->id)->delete();

            return redirect()->route('main');
        }else{
            return redirect()->route('singleReview', $review->id);
        }

    }


    public function getUserReviews(User $user)
    {
        $user = Auth::user();
        return view('main',
            [
                'reviews' => $user->reviews->load(["user", "artist", "album"])
            ]);
    }

    public function getSingleReview(Review $review)
    {
        return view('review',
            [
                'review' => $review

            ]);
    }

    public function editForm(Review $review)
    {
        return view('edit',
        [
            'review' => $review
        ]);
    }

    public function deleteConfirmation(Review $review)
    {
        return view('delete',
        [
            'review' => $review
        ]);
    }
}
