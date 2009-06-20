<p><a href="<?php echo url::site('install') ?>">&laquo; Back</a></p>

<form action="<?php echo url::site('install/license') ?>" method="post">
  <fieldset>
    <legend><?php echo Kohana::lang('install.license') ?></legend>

    <div>
      <p>This license is a legal agreement between you and the Kohana Software Foundation for the use of Kohana Framework (the "Software"). By obtaining the Software you agree to comply with the terms and conditions of this license.</p>

      <p>Copyright (c) 2007-2008 Kohana Team<br/>All rights reserved.</p>

      <p>Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:</p>

      <ul>
        <li>Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.</li>
        <li>Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.</li>
        <li>Neither the name of the Kohana nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.</li>
      </ul>

      <p>THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</p>

      <p><small>NOTE: This license is modeled after the BSD software license.</small></p>
    </div>

    <div>
      <label><input type="checkbox" id="accept" name="accept"/> Ich stimme den Lizenzvereinbarungen zu.</label>
    </div>

    <div>
      <button type="submit" id="send" name="send"><?php echo Kohana::lang('install.confirm') ?></button>
    </div>
  </fieldset>
</form>