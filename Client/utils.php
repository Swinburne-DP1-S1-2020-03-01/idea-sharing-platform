<?php
    function DisplayAuthor($username, $email)
    {
        $authorName = "";
        if ($username == null || $username == "")
        {
            $authorname = $email;
        }
        else
        {
            $authorname = $username;
        }
        return $authorname;
    }

    function DisplayArticlePreview($fullText, $wordLimit)
    {
        $article_preview = $fullText;
        if (strlen($fullText) > $wordLimit)
        {
            $maxLength = $wordLimit;
            $article_preview = substr($article_preview, 0, $maxLength);
            $article_preview .= "...";
        }
        return $article_preview;
    }

    function DisplayDraftMessage($isDraft)
    {
        $message = ($isDraft == 1 ? "Not published" : "Published");
        return $message;
    }
?>