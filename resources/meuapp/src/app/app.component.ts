import { Component } from '@angular/core';
import { Post } from './post';
import { MatDialog } from '@angular/material/dialog';
import { PostDialogComponent } from './post-dialog/post-dialog.component';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent {
    title = 'meuapp';
    public posts: Post[] = [
        new Post("Joao" , "Meu Post" ,"sub joao", "joao@gmail.com", "minha msg do joao"),
        new Post("Walace" , "Post do Walace" ,"sub Walace", "walace@gmail.com", "msg do Walace"),
        new Post("Maria" , "Post da Maria" ,"sub Maria", "maria@gmail.com", "msg da Maria"),
        new Post("Joao" , "Meu Post" ,"sub joao", "joao@gmail.com", "minha msg do joao"),
        new Post("Walace" , "Post do Walace" ,"sub Walace", "walace@gmail.com", "msg do Walace"),
        new Post("Maria" , "Post da Maria" ,"sub Maria", "maria@gmail.com", "msg da Maria"),
        new Post("Joao" , "Meu Post" ,"sub joao", "joao@gmail.com", "minha msg do joao"),
        new Post("Walace" , "Post do Walace" ,"sub Walace", "walace@gmail.com", "msg do Walace"),
        new Post("Joao" , "Meu Post" ,"sub joao", "joao@gmail.com", "minha msg do joao"),
        new Post("Walace" , "Post do Walace" ,"sub Walace", "walace@gmail.com", "msg do Walace"),
        new Post("Walace" , "Post do Walace" ,"sub Walace", "walace@gmail.com", "msg do Walace"),
    ]

    constructor(public dialog: MatDialog){}

    openDialog() {
        const dialogRef = this.dialog.open(PostDialogComponent, {
            width: '600px'
        })
        dialogRef.afterClosed().subscribe(result => {
            if(result)
                console.log(result)
        })
    }
}
