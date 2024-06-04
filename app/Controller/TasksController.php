<?php
class TasksController extends AppController{
    //動作確認のためにscaffold
    public $scaffold;

    public function index() {
        //データをモデルから取得してビューへ渡す
        $options=array(
            'conditions'=>array(
                'Task.status'=>0
            )
        );

        $tasks_data=$this->Task->find('all',$options);
        $this->set('tasks_data',$tasks_data);


        // app/View/Tasks/index.ctpを表示
        $this->render('index');
    }

    public function done() {
        //urlの末尾からタスクのIDを取得してメッセージを作成
        $msg=sprintf(
            'タスク%sを完了しました',
            $this->request->pass[0]
        );

        //メッセージを表示してリダイレクト
        $this->flash($msg,'/Tasks/index');
    }
}