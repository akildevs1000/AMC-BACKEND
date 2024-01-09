<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreRequest;
use App\Http\Requests\Question\UpdateRequest;

use App\Models\Question;
use App\Models\QuestionHeading;

class QuestionController extends Controller
{

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $questions = [];

        foreach ($data['headings'] as $heading) {
            $createdHeading = QuestionHeading::create([
                'equipment_category_id' => $data['equipment_category_id'],
                'name' => $heading['name'],
            ]);

            foreach ($heading['questions'] as $question) {
                $questions[] = [
                    'question_heading_id' => $createdHeading->id,
                    'name' => $question['name'],
                ];
            }
        }

        $response = Question::insert($questions);

        try {
            if ($response) {
                return $this->response('Question successfully created.', null, true);
            } else {
                return $this->response('Question cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Question cannot create.', null, false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Question $Question)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $Question)
    {
        try {
            if ($Question->delete()) {
                return $this->response('Question successfully deleted.', null, true);
            } else {
                return $this->response('Question cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Question cannot delete.', null, false);
        }
    }

    public function destroyHeading($id)
    {
        try {
            if (QuestionHeading::where("id", $id)->delete()) {
                Question::where("question_heading_id", $id)->delete();
                return $this->response('Heading successfully deleted.', null, true);
            } else {
                return $this->response('Heading cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Heading cannot delete.', null, false);
        }
    }
}
