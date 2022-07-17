<div>
    <div class="container">
        <div id="contact">
            @if($submitted)
                <div class="text-center">
                    <span class="green">Форма успешно передана</span>
                </div>
            @else
                <div id="contact-wrapper">
                    <h3>Заполните форму</h3>
                    <h5>
                        @error("name")<span class="error">{{ $message }}</span>
                        @elseif(is_null($name))ИМЯ:
                        @elseif(!is_null($name))<span class="good">OK ✓</span>
                        @enderror
                    </h5>
                    <fieldset>
                        <input wire:model="name" placeholder="заполните поле именем..." type="text" tabindex="1"
                               required autofocus>
                    </fieldset>
                    <h5>
                        @error("email")<span class="error">{{ $message }}</span>
                        @elseif(is_null($email))ПОЧТА:
                        @elseif(!is_null($email))<span class="good">OK ✓</span>
                        @enderror
                    </h5>
                    <fieldset>
                        <input wire:model="email" placeholder="заполните поле почтой..." type="email" tabindex="2"
                               required>
                    </fieldset>
                    <h5>
                        @error("phone")<span class="error">{{ $message }}</span>
                        @elseif(is_null($phone))НОМЕР ТЕЛЕФОНА:
                        @elseif(!is_null($phone))<span class="good">OK ✓</span>
                        @enderror
                    </h5>
                    <fieldset>
                        <input wire:model="phone" placeholder="заполните поле телефоном..." type="tel" tabindex="3"
                               required>
                    </fieldset>
                    <h5>
                        @error("website")<span class="error">{{ $message }}</span>
                        @elseif(is_null($website))ВАШ САЙТ:
                        @elseif(!is_null($website))<span class="good">OK ✓</span>
                        @enderror
                    </h5>
                    <fieldset>
                        <input wire:model="website" placeholder="заполните поле сайтом..." type="url" tabindex="4"
                               required>
                    </fieldset>
                    <h5>
                        @error("question")<span class="error">{{ $message }}</span>
                        @elseif(is_null($question))ВАШ ВОПРОС:
                        @elseif(!is_null($question))<span class="good">OK ✓</span>
                        @enderror
                    </h5>
                    <fieldset>
                        <textarea wire:model="question" placeholder="задайте свой вопрос..." tabindex="5"
                                  required></textarea>
                    </fieldset>
                    @if($isComboGood["name"] && $isComboGood["email"] && $isComboGood["phone"] && $isComboGood["website"] && $isComboGood["question"])
                        <button wire:click="submit" name="submit" id="contact-submit">Отправить</button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
