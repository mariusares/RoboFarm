import java.awt.*;
import java.util.ArrayList;

public class ShapesManager {
    private ArrayList<Shape> shapes = new ArrayList<>();
    private boolean displayName = true;
    private boolean displayBoundingBox = true;

    public boolean isDisplayName() {
        return displayName;
    }

    public void setDisplayName(boolean displayName) {
        this.displayName = displayName;
    }

    public boolean isDisplayBoundingBox() {
        return displayBoundingBox;
    }

    public void setDisplayBoundingBox(boolean displayBoundingBox) {
        this.displayBoundingBox = displayBoundingBox;
    }

    public void addShape(Shape shapeToAdd){
        shapes.add(shapeToAdd);
    }

    public void drawShapes(Graphics graphicsContext){
        for (Shape currShape:shapes) {
            currShape.drawShape(graphicsContext,displayName,displayBoundingBox);
        }
    }

        public ArrayList<Shape> getShapes(){
        return shapes;
    }

}

