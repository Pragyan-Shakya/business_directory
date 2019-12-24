<?php
    namespace App\Http\Traits;

    use App\Http\Requests\CompanyRegisterRequest;
    use App\Model\Employer;
    use Illuminate\Support\Str;
    use Intervention\Image\Facades\Image;

    trait CompanyTrait {

        public function update(CompanyRegisterRequest $request, $id)
        {
            $company = $this->model->show($id);
            $data = $request->all();
            unset($data['_token']);
            $employer = Employer::find($request->employers_id);
            if($files = $request->file('logo')) {
                if($company->logo && is_file($company->logo)){
                    unlink($company->logo);
                }
                // for save original image
                $ImageUpload = Image::make($files)->resize(200, 200);
                $originalPath = 'public/assets/uploads/logos/'.time().$files->getClientOriginalName();
                $ImageUpload->save($originalPath);
                $data['logo'] = $originalPath;
            }
            if($files = $request->file('cover_image')) {
                if($company->cover_image && is_file($company->cover_image)){
                    unlink($company->cover_image);
                }
                // for save original image
                $ImageUpload = Image::make($files);
                $originalPath = 'public/assets/uploads/cover_images/'.time().$files->getClientOriginalName();
                $ImageUpload->save($originalPath);
                $data['cover_image'] = $originalPath;
            }
            $data['user_id'] = $employer->user_id;
            $data['slug'] = Str::slug($request->title);
            $data['seo'] = $request->title;

            $this->model->update($data, $id);
            return redirect()->back()->with('success', 'Company Profile Updated!!!');
        }


    }