define([
        'jquery',
        'ko',
        'jquery/ui',
        'mage/cookies',
        'mage/translate'
    ], function ($, ko) {
        'use strict';

        return function (data, mainModel) {
            var self = this;
            self.questionId = Number(data.question_id);
            self.categoryId = Number(data.category_id);
            self.sortOrder = Number(data.sort_order);
            self.status = Number(data.status) === 1;
            self.question = data.question;
            self.answer = data.answer;

            self.getCookieName = function (type) {
                return 'faq_question_' + self.questionId + '_' + type;
            };

            self.getCookieValue = function (type) {
                var value = $.mage.cookies.get(self.getCookieName(type));

                return (value) ? value : false;
            };

            self.setCookieValue = function (type, value) {
                $.mage.cookies.set(self.getCookieName(type), value, {
                    lifetime: 604800
                });
            };


            self.changeFeedbackByParams = function (type, delta, callback) {
                $.ajax(
                    {
                        url: mainModel.getApiUrl() + 'question/' + type + '/' + self.questionId + '/delta/' + delta,
                        type: "GET",
                        cache: false,
                        success: function (result) {
                            if (result && typeof callback === 'function') {
                                callback();
                            }
                        }
                    }
                );
            };

        }
    }
);
