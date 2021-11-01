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
    public function getAllReviews()
    {
        return view('main',
        [
            'reviews' => Review::with("user", "artist", "album")->get(),

        ]);
    }

    public function addReviewForm()
    {
        return view('new');
    }

    public function storeData(ReviewRequest $request)
    {
       /* $review = new Review;

        $review->user_id = $request->input('user_id');
        $review->artist_id = $request->input('artist_id');
        $review->album_id = $request->input('album_id');
        $review->review_body = $request->input('review_body');
        $review->rating = $request->input('rating');
        $review->save(); */

       /* $validatedData = $request->validate(
       [
           'user_id' => 'required|exists:App\Models\User,id',
           'artist_id' => 'required|exists:App\Models\Artist,id',
           'album_id' => 'required|exists:App\Models\Album,id',
           'review_body' => 'required|max:1000',
           'rating' => 'required|numeric|between:1,10'
       ]);

       Review::create($request->all()); */


       $review = new Review;
       $review->fill($request->validated());
       $review->save();

        return redirect()->route('addReview');

    }

    public function updateReview(ReviewRequest $request, $id)
    {
        Review::where('id', $id)
            ->update($request->validated());

        return redirect()->route('singleReview', $id);
    }

    public function deleteReview(Request $request, $id)
    {
        Review::where('id', $id)
            ->delete();

        return redirect()->route('main');
    }


    public function getUserReviews(User $user)
    {
        $user = Auth::user();
        return view('main',
            [
                'reviews' => $user->reviews
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
