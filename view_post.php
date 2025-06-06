<?php
session_start();

if (!isset($_SESSION['posts']) || !isset($_GET['index'])) {
    header("Location: index.php");
    exit();
}

$index = $_GET['index'];
if (!isset($_SESSION['posts'][$index])) {
    header("Location: index.php");
    exit();
}

$post = $_SESSION['posts'][$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($post['title']); ?> | BlogWeb</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body class="bg-gray-900 text-gray-100">

<?php include("includes/header.php"); ?>

<section class="py-20">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
      <a href="index.php" class="text-indigo-500 hover:text-indigo-400">← Back to all posts</a>
    </div>
    
    <article class="prose prose-invert max-w-none">
      <h1 class="text-3xl font-extrabold text-white mb-4"><?php echo htmlspecialchars($post['title']); ?></h1>
      
      <div class="flex items-center text-gray-400 text-sm mb-8">
        <span>Posted by <?php echo htmlspecialchars($post['author']); ?> on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
      </div>
      
      <?php if (!empty($post['image_path'])): ?>
        <img src="<?php echo $post['image_path']; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-auto rounded-lg mb-8">
      <?php endif; ?>
      
      <p class="text-lg text-gray-300 mb-4"><?php echo htmlspecialchars($post['description']); ?></p>
      
      <div class="text-gray-300 whitespace-pre-line"><?php echo htmlspecialchars($post['content']); ?></div>
    </article>
    
    <div class="mt-12 pt-8 border-t border-gray-800">
      <a href="index.php" class="text-indigo-500 hover:text-indigo-400">← Back to all posts</a>
    </div>
  </div>
</section>

<?php include("includes/footer.php"); ?>

</body>
</html>