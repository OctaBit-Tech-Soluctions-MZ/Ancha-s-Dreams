
    <!-- Lesson Modal -->
    <div class="rbt-default-modal modal fade" id="Lesson" tabindex="-1" aria-labelledby="LessonLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></button></div>
                <div class="modal-body">
                    <div class="inner rbt-default-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="modal-title mb--20" id="LessonLabel">Add Lesson</h5>
                                <div class="course-field mb--20"><label for="modal-field-1">Lesson
                                        Name</label><input id="modal-field-1" type="text"><small><i class="feather-info"></i> Lesson titles are
                                        displayed publicly wherever required. Each Lesson may contain one or more
                                        lessons, quiz
                                        and assignments.</small></div>
                                <div class="course-field mb--20"><label for="modal-field-2">Lesson
                                        Summary</label><textarea id="modal-field-2"></textarea><small><i class="feather-info"></i> Add a summary of short
                                        text to prepare students for the activities for the Lesson. The text is
                                        shown on the
                                        course page beside the tooltip beside the Lesson name.</small></div>
                                <div class="course-field mb--20">
                                    <h6>Feature Image</h6>
                                    <div class="rbt-create-course-thumbnail upload-area">
                                        <div class="upload-area">
                                            <div class="brows-file-wrapper" data-black-overlay="9">
                                                <!-- actual upload which is hidden -->
                                                <input name="createinputfile" id="createinputfile" type="file" class="inputfile">
                                                <img id="createfileImage" src="Create%20Course%20-%20Online%20Courses%20&amp;%20Education%20Bootstrap5%20Template_files/thumbnail-placeholder.svg" alt="file image">
                                                <!-- our custom upload button -->
                                                <label class="d-flex" for="createinputfile" title="No File Choosen">
                                                    <i class="feather-upload"></i>
                                                    <span class="text-center">Choose a File</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <small><i class="feather-info"></i> <b>Size:</b> 700x430 pixels, <b>File
                                            Support:</b>
                                        JPG, JPEG, PNG, GIF, WEBP</small>
                                </div>
                                <div class="course-field mb--20">
                                    <h6>Video Source</h6>
                                    <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10"><div class="dropdown bootstrap-select w-100"><select class="w-100">
                                            <option selected="selected">Select Video Source</option>
                                            <option>External URL </option>
                                            <option>Youtube </option>
                                            <option>Vimo</option>
                                            <option>facebook</option>
                                            <option>twitter</option>
                                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-5" aria-haspopup="listbox" aria-expanded="false" title="Select Video Source"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Select Video Source</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-5" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div></div>
                                </div>
                                <div class="course-field mb--15"><label>Video playback time</label>
                                    <div class="row row--15">
                                        <div class="col-lg-4"><input type="number" placeholder="00"><small class="d-block mt_dec--5"><i class="feather-info"></i> Hour.</small>
                                        </div>
                                        <div class="col-lg-4"><input type="number" placeholder="00"><small class="d-block mt_dec--5"><i class="feather-info"></i>
                                                Minute.</small></div>
                                        <div class="col-lg-4"><input type="number" placeholder="00"><small class="d-block mt_dec--5"><i class="feather-info"></i>
                                                Second.</small></div>
                                    </div>
                                </div>
                                <div class="course-field mb--20">
                                    <h6>Upload exercise files to the Lesson</h6>
                                    <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10"><button class="rbt-btn btn-md btn-border hover-icon-reverse"><span class="icon-reverse-wrapper"><span class="btn-text">Upload
                                                    Attachments</span><span class="btn-icon"><i class="feather-paperclip"></i></span><span class="btn-icon"><i class="feather-paperclip"></i></span></span></button><input type="file" style="display: none;"></div>
                                </div>
                                <div class="course-field mb--20">
                                    <p class="rbt-checkbox-wrapper mb--5 d-flex"><input id="rbt-checkbox-11" name="rbt-checkbox-11" type="checkbox" value="yes"><label for="rbt-checkbox-11">Enable Course Preview</label></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-circle-shape"></div>
                <div class="modal-footer pt--30 justify-content-between"><button type="button" class="rbt-btn btn-border btn-md radius-round-10" data-bs-dismiss="modal">Cancel</button>
                    <div class="content"><button type="button" class="rbt-btn btn-md">Update Lesson</button></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Lesson Modal -->
