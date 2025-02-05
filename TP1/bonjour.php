<!DOCTYPE html>
<html>
  <head>
    <title>Titre du document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
      html,
      body {
        height: 100%;
      }
      body {
        display: flex;
        flex-wrap: wrap;
        margin: 0;
      }
      .header-menu,
      footer {
        display: flex;
        align-items: center;
        width: 100%;
      }
      .header-menu {
        justify-content: flex-end;
        height: 60px;
        background: #1c87c9;
        color: #fff;
      }
      h2 {
        margin: 0 0 8px;
      }
      ul li {
        display: inline-block;
        padding: 0 10px;
        list-style: none;
      }
      aside {
        flex: 0.4;
        height: 165px;
        padding-left: 15px;
        border-left: 1px solid #666;
      }
      section {
        flex: 1;
        padding-right: 15px;
      }
      footer {
        padding: 0 10px;
        background: #ccc;
      }
    </style>
  </head>
  <body>
    <header class="header-menu">
      <nav>
        <ul>
          <li>Élément de menu</li>
          <li>Élément de menu</li>
          <li>Élément de menu</li>
        </ul>
      </nav>
    </header>
    <section>
      <article>
        <header>
          <h2>Apprenez HTML</h2>
          <small>Hyper Text Markup Language</small>
        </header>
        <p>Notre didacticiel HTML gratuit pour les débutants vous apprendra le langage HTML et vous expliquera comment créer votre site Web à partir de rien. HTML n'est pas difficile, alors espérons que vous apprécierez l'apprentissage.</p>
      </article>
      <article>
        <header>
          <h2>Commencez le questionnaire "HTML de base"</h2>
          <small>Vous pouvez tester votre compétences HTML avec le questionnaire W3docs'.</small>
        </header>
        <p>Vous gagnez 5% pour chaque bonne réponse des questions avec un choix. Pour les questions qui ont quelques choix, le score est jusqu'à 5%. À la fin, Votre score total sera affiché. Le score maximum est 100%.</p>
      </article>
    </section>
    <aside>
      <h2>Nos livres</h2>
      <p>HTML</p>
      <p>CSS</p>
      <p>JavaScript</p>
      <p>PHP</p>
    </aside>
    <footer>
      <small>Company © W3docs. Tous droits réservés.</small>
    </footer>
  </body>
